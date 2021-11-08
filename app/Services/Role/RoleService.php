<?php

namespace App\Services\Role;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;

class RoleService
{
    protected Role $role;

    public function __construct(Role $role = null)
    {
        $this->role = $role ? $role : new Role();
    }

    public function assignData(array $data): Role
    {
        $this->role->name = $data['name'];
        $this->role->key = $data['key'];
        $this->role->save();
        return $this->role;
    }
    public function syncGroup(Group $group, Role $role=null, User $user){
        //$permission = $permission?$permission:$this->permission;
        $role->groups()->attach($group,['user_id'=>$user->id]);
        return $role;
    }
    public function changeUserRole(Group $group, Role $role, User $user){
        $role->groups()->attach($group,['user_id'=>$user->id]);
    }
}
