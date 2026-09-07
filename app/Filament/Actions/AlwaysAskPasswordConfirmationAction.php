<?php

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class AlwaysAskPasswordConfirmationAction extends Action
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Actions\XotBaseAction;

final class AlwaysAskPasswordConfirmationAction extends XotBaseAction
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    protected function setUp(): void
    {
        $this->requiresConfirmation()
            ->modalHeading(__('filament-jet::jet.password_confirmation_modal.heading'))
<<<<<<< HEAD
<<<<<<< HEAD
            ->modalSubheading(__('filament-jet::jet.password_confirmation_modal.description'))
=======
            ->modalDescription(__('filament-jet::jet.password_confirmation_modal.description'))
>>>>>>> 2024e2e7 (.)
=======
            ->modalDescription(__('filament-jet::jet.password_confirmation_modal.description'))
>>>>>>> f589f9b2 (.)
            ->schema([
                TextInput::make('current_password')
                    ->required()
                    ->password()
                    ->rule('current_password'),
            ]);
    }
}
