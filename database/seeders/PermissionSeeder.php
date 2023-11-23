<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            $permissions = [ 
                  'brands-list', 
                  'brands-view', 
                  'brands-create', 
                  'brands-edit', 
                  'brands-delete',

                  'products-list', 
                  'products-view', 
                  'products-create', 
                  'products-edit', 
                  'products-delete',

                  'categories-list', 
                  'categories-view', 
                  'categories-create', 
                  'categories-edit', 
                  'categories-delete',

                  'subCategories-list', 
                  'subCategories-view', 
                  'subCategories-create', 
                  'subCategories-edit', 
                  'subCategories-delete',

                  'roles-list', 
                  'roles-view', 
                  'roles-create', 
                  'roles-edit', 
                  'roles-delete',

                  'users-list', 
                  'users-view', 
                  'users-create', 
                  'users-edit', 
                  'users-delete',

                  'notifications-list', 
                  'notifications-view', 
                  'notifications-create', 
                  'notifications-edit', 
                  'notifications-delete',

                  'audits-list', 
                  'audits-view', 
                  'audits-create', 
                  'audits-edit', 
                  'audits-delete',

                  'logs-list', 
                  'logs-view', 
                  'logs-create', 
                  'logs-edit', 
                  'logs-delete',

                  'settings-list',
                  'settings-create',
            ];
        
            foreach ($permissions as $permission) {
                  Permission::create(['name' => $permission]);
            }
      }
}