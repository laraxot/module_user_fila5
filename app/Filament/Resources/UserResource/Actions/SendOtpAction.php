<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< HEAD
use RuntimeException;
=======
>>>>>>> laraxot/dev

/**
 * Azione Filament per l'invio di un OTP all'utente.
 */
class SendOtpAction extends XotBaseAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->tooltip(trans('user::otp.actions.send_otp'))
            ->icon('heroicon-o-key')
            ->action(function (User $record): void {
                // User already implements UserContract, no need for assertion
                $action = app(SendOtpByUserAction::class);
<<<<<<< HEAD
                if ($action === null) {
                    throw new RuntimeException('Impossibile istanziare SendOtpByUserAction');
=======
                if (null === $action) {
                    throw new \RuntimeException('Impossibile istanziare SendOtpByUserAction');
>>>>>>> laraxot/dev
                }
                // PHPStan Level 10: User extends BaseUser which implements UserContract
                $action->execute($record);
            })
            ->requiresConfirmation()
            ->modalHeading(trans('user::otp.actions.send_otp'))
<<<<<<< HEAD
            ->modalDescription(trans('user::otp.actions.confirm_otp'))
            ->modalSubmitActionLabel(trans('user::otp.actions.yes_send_otp'));
=======
            ->modalSubheading(trans('user::otp.actions.confirm_otp'))
            ->modalButton(trans('user::otp.actions.yes_send_otp'));
>>>>>>> laraxot/dev
    }

    /**
     * Ottieni il nome predefinito dell'azione.
     */
    public static function getDefaultName(): ?string
    {
        return 'send_otp';
    }
}
