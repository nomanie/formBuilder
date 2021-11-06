<?php

namespace App\Services\Group;

use App\Models\Group;
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
}
