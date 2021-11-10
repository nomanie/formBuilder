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

class InvitationController extends Controller
{
   public function store($id,Request $request){
       $input = $request->validate([
           'group_id'=>'required',
           'email'=>'required'
       ]);
       $group = Group::where('id',$input['group_id'])->first();
       $user = User::where('email',$input['email'])->first();
       if($group->creator_id == Auth::user()->id){
           (new GroupService())->inviteUser($group,$user);
           return back();
       }
       else{
           return "ERROR!";
       }
   }
   public function show($id){
       $user = User::with('invites')->where("id",$id)->get();
       //return $user;
       return view('/home/pages/invites/show')->with('invitations',$user);
   }
    public function showSended($id){
       $invites = [];
       $inv = Group::with('invites')->get();
       for($i=0,$j=0;$i<$inv->count();$i++){
           if($inv[$i]['invites']->count()){
               $invites[$j++] = $inv[$i];
               //echo $inv[$i];
           }

       }
       //return "a";
        //$inv = User::with('groups')->with('invites')->where('id',$id)->get();
        //return $invites;
        return view('/home/pages/invites/showSended')->with('invites',$invites);
    }
   public function join($id,$gid){
       $user = User::where('id',$id)->first();
       $group = Group::where('id',$gid)->first();
       (new GroupService())->syncUser($user,$group);
       (new RoleService())->syncGroup($group,Role::where('name','User')->first(),$user);
       $user->invites()->detach($group);
       return back();
   }
   public function refuse($id,$gid){
       $user = User::where('id',$id)->first();
       $group = Group::where('id',$gid)->first();
       $user->invites()->detach($group);
       return back();
   }
   public function cancel($id,$gid){
       $user = User::where('id',$id)->first();
       $group = Group::where('id',$gid)->first();
       (new GroupService())->cancelInvite($group,$user);
       return back();
   }

}
