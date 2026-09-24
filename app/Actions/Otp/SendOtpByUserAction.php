<?php

declare(strict_types=1);

namespace Modules\User\Actions\Otp;

use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Datas\PasswordData;
use Modules\User\Notifications\Auth\Otp;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

/**
 * SendOtpByUserAction.
 *
 * Handles the creation and dispatch of a One-Time Password (OTP) for secure user authentication.
 */
class SendOtpByUserAction
{
    use QueueableAction;

    public function __construct(
        private readonly PasswordData $passwordData,
        private readonly Str $stringHelper,
        private readonly HashOtpValueAction $hashOtpValueAction,
    ) {
    }

    /**
     * Execute the action: Generate and send an OTP to the specified user.
     *
     * @param UserContract $user user to receive the OTP
     */
    public function execute(UserContract $user): void
    {
        $temporaryPassword = $this->generateTemporaryPassword();
        $expirationTime = $this->calculateOtpExpiration();

        $this->updateUserWithOtp($user, $temporaryPassword, $expirationTime);
        $this->dispatchOtpNotification($user, $temporaryPassword);
        $this->displaySuccessNotification();
    }

    private function generateTemporaryPassword(): string
    {
        return $this->stringHelper->random(12);
    }

    private function calculateOtpExpiration(): Carbon
    {
        return Carbon::now()->addMinutes($this->passwordData->otp_expiration_minutes);
    }

    private function updateUserWithOtp(UserContract $user, string $temporaryPassword, Carbon $expirationTime): void
    {
        $user->update([
            'password' => $this->hashOtpValueAction->execute($temporaryPassword),
            'is_otp' => true,
            'password_expires_at' => $expirationTime,
        ]);
    }

    private function dispatchOtpNotification(UserContract $user, string $temporaryPassword): void
    {
        Notification::route('mail', $user->email)->notify(new Otp($user, $temporaryPassword));
    }

    private function displaySuccessNotification(): void
    {
        FilamentNotification::make()
            ->title(__('user::otp.actions.send_otp_success'))
            ->success()
            ->send();
    }
}
