<?php

namespace App\Services\Permission;

use App\Models\Group;
use App\Models\Permission;

class PermissionService
{
    protected Permission $permission;

    public function __construct(Permission $permission = null)
    {
        $this->permission = $permission ? $permission : new Permission();
    }

    public function assignData(array $data): Permission
    {
        $this->permission->name = $data['name'];
        $this->permission->key = $data['key'];
        $this->permission->save();
        return $this->permission;
    }
    public function syncGroup(Group $group, Permission $permission=null){
        $permission = $permission?$permission:$this->permission;
        $permission->groups()->sync($group);
        return $permission;
    }
}
