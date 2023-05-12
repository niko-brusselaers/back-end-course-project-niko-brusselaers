<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view adminIndex']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'view inventoryManagementIndex']);
        Permission::create(['name' => 'view item']);
        Permission::create(['name' => 'edit item']);
        Permission::create(['name' => 'create item']);
        Permission::create(['name' => 'delete item']);

        Permission::create(['name' => 'view lendingServiceIndex']);
        Permission::create(['name' => 'view loan']);
        Permission::create(['name' => 'edit loan']);
        Permission::create(['name' => 'create loan']);
        Permission::create(['name' => 'delete loan']);

        $admin = Role::create(['name' =>'admin']);
        $admin->givePermissionTo(Permission::all());

        $lendingService= Role::create(['name' => 'lendingService']);
        $lendingService->givePermissionTo('view inventoryManagementIndex');
        $lendingService->givePermissionTo('view item');
        $lendingService->givePermissionTo('edit item');
        $lendingService->givePermissionTo('create item');
        $lendingService->givePermissionTo('delete item');
        $lendingService->givePermissionTo('view lendingServiceIndex');
        $lendingService->givePermissionTo('view loan');
        $lendingService->givePermissionTo('edit loan');
        $lendingService->givePermissionTo('create loan');
        $lendingService->givePermissionTo('delete loan');

        $user= Role::create(['name' => 'user']);


    }
}
