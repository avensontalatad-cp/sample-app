<?php

namespace Database\Seeders;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    protected $modelsDirectory = 'app/Models/*';

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function run()
    {
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->seedRoles();
    }

    private function seedRoles()
    {
        $backendRoles = [
            'Super Admin',
            'Admin',
        ];

        foreach ($backendRoles as $backendRole) {
            $role = Role::findOrCreate($backendRole, 'backend');
            $this->command->info('Added backend role: ' . $role->name);
        }
    }
}
