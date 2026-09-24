<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class ChangePasswordCommand extends Command
{
<<<<<<< HEAD
    protected $signature = 'user:change-password {--email= : Email dell\'utente}';
=======
    protected $signature = 'user:change-password';
>>>>>>> 350420cb (Check & fix styling)

    protected $description = 'Change user password';

    public function handle(): void
    {
<<<<<<< HEAD
        $emailInput = $this->option('email') ?? $this->ask('Enter the user email:');
        Assert::string($emailInput);

        $email = strtolower(trim($emailInput));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email non valida: '.$emailInput);
=======
        Assert::string($email = $this->ask('Enter the user email:'));
        try {
            $user = XotData::make()->getUserByEmail($email);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
>>>>>>> 350420cb (Check & fix styling)

            return;
        }

<<<<<<< HEAD
        $user = XotData::make()->findUserByEmail($email);

        if ($user === null) {
            $this->error("Utente non trovato per email: {$email}");
=======
        // Ensure we fetched a persisted user and not a transient instance to avoid accidental insert
        if (! $user->exists()) {
            Assert::false(
                $user->exists(),
                __FILE__.':'.__LINE__.' - '.class_basename(self::class).' - User model should exist in database before password change'
            );
            $this->error('User not found or not persisted. Please create the user first (name, email, type, etc.).');
>>>>>>> 350420cb (Check & fix styling)

            return;
        }

        Assert::string($password = $this->secret('Enter the new password:'));
        $confirmPassword = $this->secret('Confirm the new password:');

        if ($password !== $confirmPassword) {
            $this->error('Passwords do not match!');

            return;
        }
<<<<<<< HEAD

        $pwdData = PasswordData::make();
        $passwordExpiryDateTime = now()->addDays($pwdData->expires_in);

=======
        $pwd_data = PasswordData::make();
        $passwordExpiryDateTime = now()->addDays($pwd_data->expires_in);
        /*
         * $user->is_otp = false;
         * $user->password = Hash::make($password);
         * $user->save();
         */
>>>>>>> 350420cb (Check & fix styling)
        $user = tap($user)->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        event(new NewPasswordSet($user));

        $this->info('Password changed successfully!');
    }
}
