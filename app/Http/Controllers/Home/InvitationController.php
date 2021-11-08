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
use Illuminate\Support\Facades\Redirect;

class InvitationController extends Controller
{
   public function store(Request $request){
       $input = $request->validate([
           'group_id'=>'required',
           'email'=>'required'
       ]);
       $group = Group::where('id',$input['group_id'])->first();
       $user = User::where('email',$input['email'])->first();
       (new GroupService())->inviteUser($group,$user);
       return back();
   }
   public function show($id){

       $user = User::with('invites')->where("id",$id)->get();
       //return $user;
       return view('/home/pages/invites/show')->with('invitations',$user);
   }
   public function join($id,$gid){
       $user = User::where('id',$id)->first();
       $group = Group::where('id',$gid)->first();
       (new GroupService())->syncUser($user,$group);
       (new RoleService())->syncGroup($group,Role::where('name','User')->first(),$user);
       $user->invites()->detach();
       return back();
   }

}
