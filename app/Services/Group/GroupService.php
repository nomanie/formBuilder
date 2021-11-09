<?php

namespace App\Services\Group;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;

class GroupService
{
    protected Group $group;

    public function __construct(Group $group = null)
    {
        $this->group = $group ? $group : new Group();
    }
    public function assignData(array $data, User $creator): Group
    {
        $this->group->name = $data['name'];
        $this->group->creator_id = $creator->id;
        $this->group->save();
        return $this->group;
    }
    public function syncUser(User $user, Group $group=null){
        $group = $group?$group:$this->group;
        $group->users()->attach($user);
    }
    public function inviteUser(Group $group, User $user){
         //return $group->invites()->attach(['user_id'=>$user->id,'group_id'=>$group->id]);
        $group->invites()->syncWithoutDetaching($user);
    }
    public function deleteUser(Group $group, User $user){
        $group->users()->detach($user);
    }
    public function deleteGroup(Group $group){
        $group->delete();
    }
    public function changeGroupName(Group $group,$name){
        $group->name = $name;
        $group->save();
    }
    public function leaveGroup(Group $group, User $user){
        $group->users()->detach($user);
    }
    public function changeOwner(Group $group, User $user){
     $group->creator_id = $user->id;
     $group->save();
    }
    public function cancelInvite(Group $group, User $user){
        $group->invites()->detach($user);
    }
}
