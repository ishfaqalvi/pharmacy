<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NewPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [ 
            'orders-actions'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
        $role = Role::find(1);

        $role->syncPermissions(Permission::all());
    }
}
