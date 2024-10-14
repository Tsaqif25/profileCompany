<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar permissions
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        // Membuat permission jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        // Membuat role super_admin jika belum ada
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        // Membuat role designer_manager sebagai contoh
        $designerManagerRole = Role::firstOrCreate([
            'name' => 'designer_manager'
        ]);

        // Daftar permissions untuk designer_manager
        $designerManagerPermissions = [
            'manage products',
            'manage principles',
            'manage testimonials',
        ];

        // Sinkronisasi permissions untuk designer_manager role
        $designerManagerRole->syncPermissions($designerManagerPermissions);

        // Membuat user super admin
        $user = User::create([
            'name' => 'Tsaqif',
            'email' => 'super@admin.com',
            'password' => bcrypt('password')
        ]);

        // Menambahkan role super_admin ke user
        $user->assignRole($superAdminRole);
    }
}
