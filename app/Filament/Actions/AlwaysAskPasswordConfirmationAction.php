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

class AlwaysAskPasswordConfirmationAction extends Action
>>>>>>> f548be94 (.)
{
    protected function setUp(): void
    {
        $this->requiresConfirmation()
            ->modalHeading(__('filament-jet::jet.password_confirmation_modal.heading'))
<<<<<<< HEAD
            ->modalDescription(__('filament-jet::jet.password_confirmation_modal.description'))
=======
            ->modalSubheading(__('filament-jet::jet.password_confirmation_modal.description'))
>>>>>>> f548be94 (.)
            ->schema([
                TextInput::make('current_password')
                    ->required()
                    ->password()
                    ->rule('current_password'),
            ]);
    }
}
