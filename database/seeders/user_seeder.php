<?php

namespace Database\Seeders;

use App\Services\User\UserService;
use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UserService $userService)
    {
        $userService->assignData([
            'name'=>'Grupa1',
            'email'=>'asga@asd.pl',
            'password'=>'123123123',
        ]);
    }
}
