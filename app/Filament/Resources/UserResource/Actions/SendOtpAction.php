<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

<<<<<<< HEAD
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Filament\Actions\XotBaseAction;
=======
use Filament\Actions\Action;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
>>>>>>> 350420cb (Check & fix styling)

/**
 * Azione Filament per l'invio di un OTP all'utente.
 */
<<<<<<< HEAD
class SendOtpAction extends XotBaseAction
=======
class SendOtpAction extends Action
>>>>>>> 350420cb (Check & fix styling)
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->tooltip(trans('user::otp.actions.send_otp'))
            ->icon('heroicon-o-key')
            ->action(function (User $record): void {
                // User already implements UserContract, no need for assertion
                $action = app(SendOtpByUserAction::class);
                if ($action === null) {
                    throw new \RuntimeException('Impossibile istanziare SendOtpByUserAction');
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
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Ottieni il nome predefinito dell'azione.
     */
    public static function getDefaultName(): ?string
    {
        return 'send_otp';
    }
}
