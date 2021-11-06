<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Permission;
use App\Services\Permission\PermissionService;
use Illuminate\Database\Seeder;

class permission_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(PermissionService $permissionService)
    {
        $permission = $permissionService->assignData([
            'name'=>'Aktualizacja Uzytkownika',
            'key'=>'user.update'
        ]);
       // (new PermissionService($permission))->syncGroup(Group::first());
       // (new PermissionService())->syncGroup(Group::first(),$permission);
        $permissionService->syncGroup(Group::first(),$permission);
    }
}
