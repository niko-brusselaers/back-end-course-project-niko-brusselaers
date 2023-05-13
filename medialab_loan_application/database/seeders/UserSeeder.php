<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //create x amount of users and store in database
        $users = User::factory(100)->create();
        foreach ($users as $user){
            //assign role to every user
            $roles = ['admin','lendingService', 'user'];
            $user->assignRole($roles[array_rand($roles)]);
        }
    }
}
