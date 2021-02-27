<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'staff_management', 'guard_name' => 'web']);
        Permission::create(['name' => 'customer_management', 'guard_name' => 'web']);
        Permission::create(['name' => 'product_management', 'guard_name' => 'web']);
        Permission::create(['name' => 'order_management', 'guard_name' => 'web']);
        Permission::create(['name' => 'subscriber_management', 'guard_name' => 'web']);
        Permission::create(['name' => 'warehouse_management', 'guard_name' => 'web']);
    }
}
