<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> f548be94 (.)
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password {--email= : Email dell\'utente}';
=======
use function Laravel\Prompts\password;

class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password';
>>>>>>> f548be94 (.)

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
        } catch (Exception $e) {
            $this->error($e->getMessage());
>>>>>>> f548be94 (.)

            return;
        }

<<<<<<< HEAD
        $user = XotData::make()->findUserByEmail($email);

        if (null === $user) {
            $this->error("Utente non trovato per email: {$email}");
=======
        // Ensure we fetched a persisted user and not a transient instance to avoid accidental insert
        if (!$user->exists()) {
            Assert::false(
                $user->exists(),
                __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__) . ' - User model should exist in database before password change'
            );
            $this->error('User not found or not persisted. Please create the user first (name, email, type, etc.).');
>>>>>>> f548be94 (.)

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
>>>>>>> f548be94 (.)
        $user = tap($user)->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        event(new NewPasswordSet($user));

        $this->info('Password changed successfully!');
    }
}
