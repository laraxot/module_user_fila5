<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Modules\User\Models\Role;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
use Webmozart\Assert\Assert;

class SuperAdminCommand extends Command
{
    protected $signature = 'user:super-admin
                            {email? : Email utente}
                            {--email= : Email utente (alternativa al argomento)}';

    protected $description = 'Assign super-admin to user';

    public function handle(): int
    {
        $email = $this->resolveEmail();

<<<<<<< HEAD
        if ($email === null) {
=======
        if (null === $email) {
>>>>>>> laraxot/dev
            return self::FAILURE;
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email non valida: '.$email);

            return self::FAILURE;
        }

<<<<<<< HEAD
        $user = XotData::make()->getUserByEmail($email);
=======
        $user = XotData::make()->findUserByEmail($email);

        if (null === $user) {
            $this->error("Utente non trovato per email: {$email}");

            return self::FAILURE;
        }
>>>>>>> laraxot/dev

        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $user->assignRole($role);

        foreach (array_keys(Module::all()) as $module) {
            $roleName = Str::lower($module).'::admin';
            $user->assignRole(Role::firstOrCreate(['name' => $roleName]));
        }

        $this->info('super-admin assigned to '.$email);

        return self::SUCCESS;
    }

    private function resolveEmail(): ?string
    {
        $fromOption = $this->option('email');
<<<<<<< HEAD
        if (is_string($fromOption) && $fromOption !== '') {
=======
        if (is_string($fromOption) && '' !== $fromOption) {
>>>>>>> laraxot/dev
            return strtolower(trim($fromOption));
        }

        $fromArgument = $this->argument('email');
<<<<<<< HEAD
        if (is_string($fromArgument) && $fromArgument !== '') {
=======
        if (is_string($fromArgument) && '' !== $fromArgument) {
>>>>>>> laraxot/dev
            return strtolower(trim($fromArgument));
        }

        if (! $this->input->isInteractive()) {
            $this->error('Email richiesta: php artisan user:super-admin --email=tuo@email.com');

            return null;
        }

        try {
            $asked = $this->ask('email ?');
            Assert::string($asked);

            return strtolower(trim($asked));
        } catch (\Throwable $exception) {
            // WSL / TTY: fallback senza stty (Laravel Prompts fallisce qui)
            $this->warn('Prompt avanzato non disponibile, inserisci email:');

            $line = fgets(STDIN);

<<<<<<< HEAD
            if (! is_string($line) || trim($line) === '') {
=======
            if (! is_string($line) || '' === trim($line)) {
>>>>>>> laraxot/dev
                $this->error('Email non fornita. Usa: php artisan user:super-admin --email=tuo@email.com');
                $this->error($exception->getMessage());

                return null;
            }

            return strtolower(trim($line));
        }
    }
}
