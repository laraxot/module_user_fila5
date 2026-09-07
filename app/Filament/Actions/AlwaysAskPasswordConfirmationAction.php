<?php

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class AlwaysAskPasswordConfirmationAction extends Action
=======
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Actions\XotBaseAction;

final class AlwaysAskPasswordConfirmationAction extends XotBaseAction
>>>>>>> 2024e2e7 (.)
{
    protected function setUp(): void
    {
        $this->requiresConfirmation()
            ->modalHeading(__('filament-jet::jet.password_confirmation_modal.heading'))
<<<<<<< HEAD
            ->modalSubheading(__('filament-jet::jet.password_confirmation_modal.description'))
=======
            ->modalDescription(__('filament-jet::jet.password_confirmation_modal.description'))
>>>>>>> 2024e2e7 (.)
            ->schema([
                TextInput::make('current_password')
                    ->required()
                    ->password()
                    ->rule('current_password'),
            ]);
    }
}
