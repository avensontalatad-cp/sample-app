<?php

namespace Database\Seeders;

use App\Models\BackendUser;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BackendUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedSuperAdminUsers();
        $this->seedAdminUsers();
    }

    private function seedSuperAdminUsers()
    {
        $superAdminUsers = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@coreproc.ph',
                'password' => Hash::make('hello123'),
            ],
        ];

        foreach ($superAdminUsers as $superAdminUser) {
            $user = BackendUser::query()->firstOrCreate(
                ['email' => $superAdminUser['email']],
                $superAdminUser
            );

            if (! $user->hasRole(Role::SUPER_ADMIN)) {
                $user->assignRole(Role::SUPER_ADMIN);

                $this->command->info('Added super admin user: ' . $user->email);
            }
        }
    }

    private function seedAdminUsers()
    {
        $adminUsers = [
            [
                'name' => 'Admin',
                'email' => 'admin@coreproc.ph',
                'password' => Hash::make('hello123'),
            ],
        ];

        foreach ($adminUsers as $adminUser) {
            $user = BackendUser::query()->firstOrCreate(
                ['email' => $adminUser['email']],
                $adminUser
            );

            if (! $user->hasRole(Role::ADMIN)) {
                $user->assignRole(Role::ADMIN);

                $this->command->info('Added admin user: ' . $user->email);
            }
        }
    }
}
