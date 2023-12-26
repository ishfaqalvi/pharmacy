<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name'      	=> 'Super Admin',
            'email'     	=> 'superadmin@gmail.com',
            'password'  	=> 'password',
        ]);

        $role = Role::create(['name' => 'Super Admin','guard_name' => 'admin']);

        $role->syncPermissions(Permission::all());
        $admin->assignRole(1);
    }
}
