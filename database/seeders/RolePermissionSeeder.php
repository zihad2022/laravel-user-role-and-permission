<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = [
            ['name' => 'users index'],
            ['name' => 'users create '],
            ['name' => 'users show '],
            ['name' => 'users edit '],
            ['name' => 'users destroy '],

            ['name' => 'roles index'],
            ['name' => 'roles create '],
            ['name' => 'roles show '],
            ['name' => 'roles edit '],
            ['name' => 'roles destroy '],
        ];

        foreach ($permission as $item) {
            Permission::create($item);
        }

        $user = User::first();
        $role->syncPermissions($permission);
        $user->assignRole($role);
    }
}
