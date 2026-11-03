<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * The admin login comes from ADMIN_EMAIL / ADMIN_PASSWORD in .env,
     * so no credentials live in the repository.
     */
    public function run(): void
    {
        $email = config('app.admin.email');
        $password = config('app.admin.password');

        if (! $email || ! $password) {
            $this->command?->warn('ADMIN_EMAIL / ADMIN_PASSWORD not set in .env — admin user not seeded. Use: php artisan admin:create');

            return;
        }

        $user = User::firstOrNew(['email' => $email]);
        $user->name = $user->name ?: config('app.admin.name', 'Admin');
        $user->password = $password; // hashed by the model's "hashed" cast
        $user->is_admin = true;
        $user->save();
    }
}
