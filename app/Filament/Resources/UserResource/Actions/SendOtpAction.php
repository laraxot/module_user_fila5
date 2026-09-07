<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

<<<<<<< HEAD
use Filament\Actions\Action;
use RuntimeException;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Webmozart\Assert\Assert;
=======
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Filament\Actions\XotBaseAction;
>>>>>>> 2024e2e7 (.)

/**
 * Azione Filament per l'invio di un OTP all'utente.
 */
<<<<<<< HEAD
class SendOtpAction extends Action
=======
class SendOtpAction extends XotBaseAction
>>>>>>> 2024e2e7 (.)
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->tooltip(trans('user::otp.actions.send_otp'))
            ->icon('heroicon-o-key')
<<<<<<< HEAD
            ->action(function (User $record) {
                // Sappiamo già che l'utente implementa UserContract perché il tipo User lo implementa
                $action = app(SendOtpByUserAction::class);
                if ($action === null) {
                    throw new RuntimeException('Impossibile istanziare SendOtpByUserAction');
                }
                // User model extends BaseUser which implements UserContract interface
                Assert::isInstanceOf($record, UserContract::class);
=======
            ->action(function (User $record): void {
                // User already implements UserContract, no need for assertion
                $action = app(SendOtpByUserAction::class);
                if ($action === null) {
                    throw new \RuntimeException('Impossibile istanziare SendOtpByUserAction');
                }
                // PHPStan Level 10: User extends BaseUser which implements UserContract
>>>>>>> 2024e2e7 (.)
                $action->execute($record);
            })
            ->requiresConfirmation()
            ->modalHeading(trans('user::otp.actions.send_otp'))
<<<<<<< HEAD
            ->modalSubheading(trans('user::otp.actions.confirm_otp'))
            ->modalButton(trans('user::otp.actions.yes_send_otp'));
=======
            ->modalDescription(trans('user::otp.actions.confirm_otp'))
            ->modalSubmitActionLabel(trans('user::otp.actions.yes_send_otp'));
>>>>>>> 2024e2e7 (.)
    }

    /**
     * Ottieni il nome predefinito dell'azione.
     */
<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> 2024e2e7 (.)
    {
        return 'send_otp';
    }
}
