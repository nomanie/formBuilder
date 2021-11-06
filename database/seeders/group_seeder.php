<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\Group\GroupService;
use Illuminate\Database\Seeder;

class group_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(GroupService $groupService)
    {
        $groupService->assignData([
            'name'=>'Grupa1'
        ],User::first());
    }
}
