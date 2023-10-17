<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'View Role',
            'Add Role',
            'Edit Role',
            'Delete Role',
            'View Article',
            'Add Article',
            'Edit Article',
            'Delete Article',
            'View User',
            'Add User',
            'Edit User',
            'Delete User'
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}