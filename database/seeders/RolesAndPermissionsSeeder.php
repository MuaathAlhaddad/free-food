<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**************************************
         * Reset cached roles and permissions
         *************************************/
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**************************************
         * Create permissions
         *************************************/
        $permissions = [
            [
                'name' => 'user_management_access',
			],
            [
                'name' => 'users_access',
			],
            [
                'name' => 'user_create',
			],
            [
                'name' => 'user_edit',
			],
            [
                'name' => 'user_show',
			],
            [
                'name' => 'user_delete',
			],
            [
                'name' => 'user_access',
			],
            [
                'name' => 'profile_edit',
			],
            [
                'name' => 'profile_school_edit',
			],
            [
                'name' => 'users_avatar_update',
			],
            [
                'name' => 'permissions_access',
			],
            [
                'name' => 'permission_create',
			],
            [
                'name' => 'permission_edit',
			],
            [
                'name' => 'permission_show',
			],
            [
                'name' => 'permission_delete',
			],
            [
                'name' => 'permission_access',
			],
            [
                'name' => 'roles_access',
			],
            [
                'name' => 'role_create',
			],
            [
                'name' => 'role_edit',
			],
            [
                'name' => 'role_show',
			],
            [
                'name' => 'role_delete',
			],
            [
                'name' => 'role_access',
			],
            [
                'name' => 'dashboard',
			],
            [
                'name' => 'management',
			],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        /**************************************
         * Create Roles and assign Permissions
         *************************************/
        // Admin Role
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // User Role
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['profile_edit', 'users_avatar_update']);


        /**************************************
         * Create Users and assign Roles
         *************************************/
        //User 1
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('admin');

        //User 2
        $user = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'phone' => '0198765432',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('user');
    }
}
