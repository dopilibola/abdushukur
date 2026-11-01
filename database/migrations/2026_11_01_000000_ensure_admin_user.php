<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Guarantees the /admin panel login exists on every environment after
 * `php artisan migrate`. Only a bcrypt hash is stored here, never the
 * plain password. Change it later with: php artisan admin:create
 */
return new class extends Migration
{
    private const EMAIL = 'abdushukurtabiboriginal@gmail.com';

    private const PASSWORD_HASH = '$2y$12$6trvBsjH9WX4usVX/4qC/eJmrkV4TjH33vgP/U.a9qQMXDYAyVfS6';

    public function up(): void
    {
        $now = now();

        $exists = DB::table('users')->where('email', self::EMAIL)->exists();

        if ($exists) {
            DB::table('users')->where('email', self::EMAIL)->update([
                'password' => self::PASSWORD_HASH,
                'is_admin' => true,
                'updated_at' => $now,
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => self::EMAIL,
                'password' => self::PASSWORD_HASH,
                'is_admin' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        // Intentionally left blank: never delete the admin on rollback.
    }
};
