<?php


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
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'admin-dashboard',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'catagories',
            'units',
            'product_variation',
            'product',
            'inventories',
            'stock',
            'customer',
            'profile',
            'customer-profile',
            'checkout',
            'supplier',
            'listinvoice',
            'employee-dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
