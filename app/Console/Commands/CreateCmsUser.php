<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('cms:user {--name=} {--email=} {--password=} {--if-missing}')]
#[Description('Buat atau perbarui user admin CMS')]
class CreateCmsUser extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if ($this->option('if-missing') && User::query()->exists()) {
            $this->components->info('User sudah tersedia, pembuatan admin dilewati.');

            return self::SUCCESS;
        }

        $name = $this->option('name') ?: config('cms.admin.name');
        $email = $this->option('email') ?: config('cms.admin.email');
        $password = $this->option('password') ?: config('cms.admin.password');

        if (! $email && $this->input->isInteractive()) {
            $email = $this->ask('Email admin');
        }

        if (! $password && $this->input->isInteractive()) {
            $password = $this->secret('Password admin');
        }

        if (! $email || ! $password) {
            $this->components->warn('CMS_ADMIN_EMAIL dan CMS_ADMIN_PASSWORD belum diisi. User admin tidak dibuat.');

            return self::SUCCESS;
        }

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => $name ?: 'Administrator',
                'password' => $password,
            ]
        );

        $this->components->info("User admin {$email} siap digunakan.");

        return self::SUCCESS;
    }
}
