<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        /*
        $roles = ['admin','lendingService', 'lender'];
        foreach (range(1, 20) as $index) {
            $user = new User([
                'first_name' => 'User' . $index,
                'last_name' => 'Lastname' . $index,
                'userType' => "testUser",
                'role' => $roles[array_rand($roles)],
                'email' => 'user' . $index . '@example.com',
                'password' => bcrypt('password' . $index)
            ]);
            $user->save();
        }
        */
        User::factory(20)->create();

    }
}
