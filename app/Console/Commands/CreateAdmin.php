<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create
                            {--email= : Admin email (login)}
                            {--password= : Admin password (min 8 chars)}
                            {--name=Admin : Display name}';

    protected $description = 'Create an admin user for the /admin panel, or reset the password of an existing one';

    public function handle(): int
    {
        $email = $this->option('email') ?: $this->ask('Email (login)');
        $password = $this->option('password') ?: $this->secret('Password (min 8 chars)');
        $name = $this->option('name') ?: 'Admin';

        $validator = Validator::make(
            ['email' => $email, 'password' => $password],
            ['email' => ['required', 'email'], 'password' => ['required', 'string', 'min:8']],
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::firstOrNew(['email' => $email]);
        $existed = $user->exists;

        $user->name = $user->name ?: $name;
        $user->password = $password; // hashed by the model's "hashed" cast
        $user->is_admin = true;
        $user->save();

        $this->info($existed
            ? "Admin updated: {$email} (password reset)"
            : "Admin created: {$email}");
        $this->line('Login at: '.rtrim(config('app.url'), '/').'/admin');

        return self::SUCCESS;
    }
}
