<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionAdd2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'departments.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'departments.destroy', 'guard_name' => 'web']);

        $adminUserRole = Role::findByName('admin');

        $index = Permission::findByName('departments.index');

        $adminUserRole->givePermissionTo($index);
    }
}
