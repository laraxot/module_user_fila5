<?php

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Actions\XotBaseAction;

final class AlwaysAskPasswordConfirmationAction extends XotBaseAction
=======
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

final class AlwaysAskPasswordConfirmationAction extends Action
>>>>>>> 350420cb (Check & fix styling)
{
    protected function setUp(): void
    {
        $this->requiresConfirmation()
<<<<<<< HEAD
            ->modalHeading(__('user::always_ask_password_confirmation.modal.heading'))
            ->modalDescription(__('user::always_ask_password_confirmation.modal.description'))
=======
            ->modalHeading(__('filament-jet::jet.password_confirmation_modal.heading'))
            ->modalSubheading(__('filament-jet::jet.password_confirmation_modal.description'))
>>>>>>> 350420cb (Check & fix styling)
            ->schema([
                TextInput::make('current_password')
                    ->required()
                    ->password()
                    ->rule('current_password'),
            ]);
    }
}
