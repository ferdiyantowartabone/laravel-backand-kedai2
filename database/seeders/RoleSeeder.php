<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RoleSeeder extends Seeder
{
    public function run()
    {
        // Membuat permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);

        // Membuat roles dan memberikan permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('publish articles');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());  // memberikan semua permission kepada admin

                // Cari user berdasarkan ID
        $user = User::find(1);  // Misalnya user dengan ID 1

        // Berikan role admin kepada user
        $user->assignRole('admin');

    }




}
