<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions (if needed)
        // $permissions = [
        //     'create post',
        //     'edit post',
        //     'delete post',
        //     'publish post',
        //     'unpublish post',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to roles (if needed)
        // $adminRole->givePermissionTo(Permission::all()); // Admin has all permissions
        // $userRole->givePermissionTo(['create post', 'edit post']); // User has limited permissions

        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@iranrush.com',
            'phone_number' => '09114708911',
            'password' => bcrypt('password'), // Use a secure password in production
        ]);

        // Assign the admin role to the admin user
        $admin->assignRole($adminRole);
    }
}
