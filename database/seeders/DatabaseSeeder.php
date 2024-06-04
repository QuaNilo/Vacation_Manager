<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('db:wipe');
            $this->command->call('migrate');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Confirm roles needed
        if ($this->command->confirm('Create default Roles and Permissions? [y|N]', true)) {
            // Seed the default permissions
            $permissions = [
                Permission::PERMISSION_ACCESS_AS_USER,
                Permission::PERMISSION_MANAGE_APP,
                Permission::PERMISSION_ADMIN_APP,
                Permission::PERMISSION_ADMIN_FULL_APP
            ];
            //create all permissions
            foreach ($permissions as $perms) {
                Permission::firstOrCreate(['name' => $perms]);
            }

            $this->command->info('Default Permissions added.');
            $roles_array = [
                Role::ROLE_SUPER_ADMIN,
                Role::ROLE_ADMIN,
                Role::ROLE_MANAGER,
                Role::ROLE_USER
            ];
            //create all roles
            foreach ($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                //edit with the used roles
                if ($role->name == Role::ROLE_SUPER_ADMIN) {
                    // assign all permissions
                    $role->syncPermissions(Permission::whereIn('name', [Permission::PERMISSION_MANAGE_APP, Permission::PERMISSION_ADMIN_APP, Permission::PERMISSION_ADMIN_FULL_APP])->get());
                    $this->command->info('SuperAdmin granted all the permissions');
                } elseif($role->name == Role::ROLE_ADMIN){
                    // assign all permissions
                    $role->syncPermissions(Permission::whereIn('name', [Permission::PERMISSION_MANAGE_APP, Permission::PERMISSION_ADMIN_APP])->get());
                    $this->command->info('Admin granted almost all permissions');
                } elseif($role->name == Role::ROLE_MANAGER){
                    // assign all permissions
                    $role->syncPermissions(Permission::whereIn('name', [Permission::PERMISSION_MANAGE_APP])->get());
                    $this->command->info('Manager granted some permissions');
                } elseif($role->name == Role::ROLE_USER){
                    // for others by default only read access
                    $role->syncPermissions(Permission::whereIn('name', [Permission::PERMISSION_ACCESS_AS_USER])->get());
                }
            }
        }
        if ($this->command->confirm('Do you want to create the initial users? [y|N]', true)) {
            $this->call(UserSeeder::class);
        }
        if ($this->command->confirm('Do you want to apply other seeds? [y|N]', true)) {
            $this->call(SettingSeeder::class);
        }
    }
}
