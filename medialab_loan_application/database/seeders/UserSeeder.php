<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //create x amount of users and store in database
        /*
         * $users = User::factory(100)->create();
            foreach ($users as $user){
                //assign role to every user
                $roles = ['admin','lendingService', 'user'];
                $user->assignRole($roles[array_rand($roles)]);
            }
         */


        //create for diffrent users, admin,docent,lendingService,user
        $admin = new User([
            'name' => 'admin',
            'userType' => 'staff',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('adminsAreSmart'),
            'remember_token' => Str::random(10),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $docent = new User([
            'name' => 'docent',
            'userType' => 'teacher',
            'email' => 'docent@ehb.be',
            'password' => bcrypt('backendIsAwesome'),
            'remember_token' => Str::random(10),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $lendingService = new User([
            'name' => 'lending service',
            'userType' => 'staff',
            'email' => 'lending_service@ehb.be',
            'password' => bcrypt('lendingIsHandy'),
            'remember_token' => Str::random(10),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $user = new User([
            'name' => 'student',
            'userType' => 'student',
            'email' => 'student@ehb.be',
            'password' => bcrypt('studyingIsHard'),
            'remember_token' => Str::random(10),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        //assign roles to the users
        $admin->assignRole('admin');
        $docent->assignRole('admin');
        $lendingService->assignRole('lendingService');
        $user->assignRole('user');

        //save users to database
        $admin->save();
        $docent->save();
        $lendingService->save();
        $user->save();
    }
}
