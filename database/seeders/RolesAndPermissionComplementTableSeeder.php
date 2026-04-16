<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionComplementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $adminUserRole = Role::findByName('admin');

        Permission::create(['name' => 'exchange.requests.todos', 'guard_name' => 'web']);
        $adminUserRole->givePermissionTo(Permission::findByName('exchange.requests.todos'));
    }
}
