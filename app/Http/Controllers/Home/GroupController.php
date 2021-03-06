<?php

namespace App\Http\Controllers\Home;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Services\Group\GroupService;
use App\Services\Role\RoleService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Auser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    public function createView(){
        return view('home/pages/groups/create');
    }
    public function create(Request $request){
            $input = $request->validate([
                'name' => 'required|unique:groups|string|min:3|max:30|',
                'creator_id'=>'integer'
            ]);
            $user = User::where('id',$input['creator_id'])->first();
        $group = ((new GroupService)->assignData($input,$user));
        (new GroupService)->syncUser($user, $group);
        (new RoleService)->syncGroup($group,Role::where('name','Admin')->first(),$user);
        return back()->with('group',$group);
    }
    public function showAll(){
            return view('home/pages/groups/show')->with('group',User::with('groups')->where('id',Auth::user()->id)->get());
    }
    public function showOne($idd){
        $group = Group::with('users')->where('id',$idd)->first();
        foreach($group->users as $user){
            if($user->id == Auth::user()->id){
                return view('home/pages/groups/showOne')
                    ->with('group',Group::with('users')->with('roles')->where('id',$idd)->get());
            }
        }
        return "ERROR!";
    }
    public function deleteUser($group_id,$id){
        $group = Group::where('id',$group_id)->first();
        if($group->creator_id == Auth::user()->id){
            $user = User::where('id',$id)->first();
            (new GroupService())->deleteUser($group,$user);
            return back();
        }
        else{
            return "ERROR!";
        }
    }
    public function deleteGroup($id, $group_id){
        $group = Group::where('id',$group_id)->where('creator_id',$id)->first();
        if($group->creator_id == Auth::user()->id){
            (new GroupService())->deleteGroup($group);
            return Redirect::to('/');
        }
        else{
            return "ERROR!";
        }
    }
    public function changeName($group_id, Request $request){
        $input = $request->validate([
            'name'=>'required'
        ]);
        $group = Group::where('id',$group_id)->first();
        if($group->creator_id == Auth::user()->id){
            (new GroupService())->changeGroupName($group, $input['name']);
            return back();
        }
        else{
            return "ERROR!";
        }
    }
    public function changeUserRole($group_id,$user_id,Request $request){
        $input = $request->validate([
            'role'=>'int'
                ]);
        $group = Group::where('id',$group_id)->first();
        if($group->creator_id == Auth::user()->id){
            $role = Role::where('id',$input['role'])->first();
            $user = User::where('id',$user_id)->first();
            DB::table('role_group_user')->where("group_id",'=',
                $group->id)->where("user_id",'=',$user->id)->delete();
            (new RoleService())->changeUserRole($group,$role,$user);
            return back();
        }
        else{
            return "ERROR!";
        }

    }
    public function leaveGroup($id,$group_id){
        $group = Group::where('id',$group_id)->first();
        $user = User::where('id',$id)->first();
        DB::table('role_group_user')->where("group_id",'=',
            $group->id)->where("user_id",'=',$user->id)->delete();
        (new GroupService())->leaveGroup($group, $user);
        return Redirect::to("/");
    }
    public function changeOwner($group_id,Request $request){
        $input = $request->validate([
            'user_id'=>'required',
        ]);
        $user = User::where('id',$input['user_id'])->first();
        $group = Group::where('id',$group_id)->first();
        if($group->creator_id == Auth::user()->id){
            (new GroupService())->changeOwner($group,$user);
            $request = new Request(['role'=>1]);
            $this->changeUserRole($group->id,$user->id,$request);
            return back();
        }
        else{
            return "ERROR!";
        }
    }
}
