<?php

declare(strict_types=1);

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Queueable Action per la creazione di un nuovo utente.
 *
 * Pattern: Spatie Queueable Action per operazioni di business
 * Architettura: SINGLE RESPONSIBILITY - questa azione gestisce solo la creazione utente
 *
 * @see https://github.com/spatie/laravel-queueable-action
 * @see AGENTS.md#🏗️-ARCHITETTURA-LARAXOT---Queueable-Actions-Rules
 * @see AGENTS.md#🚨-COMANDO-CRITICO-GIT-git-remote--v - RICORDATI SEMPRE git remote -v prima di ogni push/pull!
 */
<<<<<<< HEAD
class CreateUserAction
=======
final class CreateUserAction
>>>>>>> 350420cb (Check & fix styling)
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * @param array<string, mixed>|null $data
=======
     * @param array<string, bool|int|string|null>|null $data
>>>>>>> 350420cb (Check & fix styling)
     */
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password,
        protected ?array $data = null,
    ) {
        // Validazione input nel costruttore
<<<<<<< HEAD
        if (empty($this->name) || empty($this->email)) {
=======
        if ('' === $this->name || '' === $this->email) {
>>>>>>> 350420cb (Check & fix styling)
            throw new \InvalidArgumentException('Nome e email sono obbligatori');
        }

        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email non valida');
        }
    }

<<<<<<< HEAD
    public function handle(): User
    {
        /** @var array<string, mixed> $attributes */
=======
    public function execute(): User
    {
        /** @var array<string, bool|int|string|null> $attributes */
>>>>>>> 350420cb (Check & fix styling)
        $attributes = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            ...($this->data ?? []),
        ];

        $user = User::create([
            ...$attributes,
        ]);

        // Logica di business aggiuntiva
        $this->sendWelcomeEmail($user);
        $this->createAuditLog($user);

        return $user;
    }

<<<<<<< HEAD
    private function sendWelcomeEmail(User $user): void
    {
        // Logica per inviare email di benvenuto
        Log::info('Invio email di benvenuto a '.$user->email);
=======
    public function handle(): User
    {
        return $this->execute();
    }

    private function sendWelcomeEmail(User $user): void
    {
        // Logica per inviare email di benvenuto
        Log::info("Invio email di benvenuto a {$user->email}");
>>>>>>> 350420cb (Check & fix styling)
    }

    private function createAuditLog(User $user): void
    {
        // Logica per creare audit log
        Log::info("Creazione audit log per nuovo utente: {$user->id}");
    }
}
