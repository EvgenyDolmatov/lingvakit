<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff_management = Permission::where('name', 'staff_management')->first();
        $product_management = Permission::where('name', 'product_management')->first();
        $order_management = Permission::where('name', 'order_management')->first();
        $subscriber_management = Permission::where('name', 'subscriber_management')->first();

        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions([
            $staff_management,
            $product_management,
            $order_management,
            $subscriber_management,
        ]);

        $teacher = Role::create(['name' => 'leader', 'guard_name' => 'web']);
        $teacher->syncPermissions([
            $product_management,
            $order_management,
        ]);

        Role::create(['name' => 'user', 'guard_name' => 'web']);
    }
}
