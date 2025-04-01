<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Crear permisos
        $permissions = [
            // Usuarios
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Roles y permisos
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            // Contenido premium
            'access premium content',

            // Administración
            'manage system',

            // Moderación
            'moderate content',
            'ban users'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // 2. Crear roles y asignar permisos
        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAdmin->givePermissionTo([
            'view users',
            'create users',
            'edit users',
            'moderate content',
            'ban users'
        ]);

        $rolePremium = Role::create(['name' => 'Premium']);
        $rolePremium->givePermissionTo([
            'access premium content'
        ]);

        $roleUser = Role::create(['name' => 'User']);
        $roleUser->givePermissionTo([
            // Permisos básicos para usuarios normales
        ]);

        // 3. Crear usuario admin de ejemplo (opcional)
        $admin = User::create([
            'name' => 'Admin',
            'firstSurname' => 'Sistema',
            'secondSurname' => 'Principal',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'avatarUrl' => 'https://example.com/admin-avatar.png',
            'reputation' => 1000,
            'isPremium' => true
        ]);

        $admin->assignRole('Super Admin');

        // 4. Asignar rol 'User' a todos los usuarios existentes (opcional)
        $users = User::all();
        foreach ($users as $user) {
            if (!$user->hasAnyRole(['Super Admin', 'Admin', 'Premium'])) {
                $user->assignRole('User');
            }
        }
    }
}
