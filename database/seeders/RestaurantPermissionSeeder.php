<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RestaurantPermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            // Order
            'Order Create',
            'Order View',
            'Order Edit',
            'Order Delete',
            'Order Cancel',
            'Order Reopen',
            'Order Hold',
            'Order Resume',

            // Item
            'Item Add',
            'Item Edit',
            'Item Remove',
            'Item Qty Update',

            // Table
            'Table Transfer',
            'Table Merge',
            'Table Split',

            // Billing
            'Bill Print',
            'Bill Discount',
            'Bill NC',
            'Bill Complimentary',
            'Bill Refund',
            'Bill Void',

            // Kitchen
            'KOT Print',

            // Reports
            'Report View',

            // Settings
            'Settings Manage',

            // User / Role
            'User Manage',
            'Role Manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $orderTaking = Role::firstOrCreate(['name' => 'Order Taking']);
        $captain = Role::firstOrCreate(['name' => 'Captain']);
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);

        // Order Taking
        $orderTaking->syncPermissions([
            'Order Create',
            'Order View',
            'Item Add',
            'Bill Print',
            'KOT Print',
        ]);

        // Captain
        $captain->syncPermissions([
            'Order Create',
            'Order View',
            'Order Edit',
            'Order Reopen',
            'Order Hold',
            'Order Resume',

            'Item Add',
            'Item Edit',
            'Item Remove',
            'Item Qty Update',

            'Table Transfer',
            'Table Merge',
            'Table Split',

            'Bill Print',
            'Bill Discount',
            'KOT Print',
        ]);

        // Super Admin
        $superAdmin->syncPermissions(
            Permission::pluck('name')->toArray()
        );
    }
}