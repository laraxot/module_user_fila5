<?php

declare(strict_types=1);

namespace Modules\User\Filament\Forms\Components;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Select;
use Modules\User\Models\Role;

class SingleRoleSelect extends Select
{
    protected string $optionValueProperty = 'id';

    // /*
    protected function setUp(): void
    {
        parent::setUp();
        $options = Role::all()->pluck('name', 'id')->toArray();

        $this->options(fn (): array => $options) // Ruoli dal DB
            // ->searchable() // Permette la ricerca
            // ->preload() // Precarica i risultati
            ->placeholder('Select a role');
    }

    // */

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\Role;
use Modules\Xot\Filament\Forms\Components\XotBaseSelect;

class SingleRoleSelect extends XotBaseSelect
{
    protected string $optionValueProperty = 'id';

    protected function setUp(): void
    {
        parent::setUp();

        /** @var view-string $viewString */
        $viewString = 'user::filament.forms.components.single-role-select';
        $this->view($viewString);

        /** @var array<int|string, string> $options */
        $options = Role::query()->pluck('name', 'id')->toArray();

        $this->options(fn (): array => $options)
            ->placeholder('Select a role');
    }

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function getOptionValueProperty(): string
    {
        return $this->optionValueProperty;
    }
<<<<<<< HEAD
<<<<<<< HEAD

    /*
     * public static function make(string $name): static
     * {
     * return parent::make($name)
     * ->options(Role::all()->pluck('name', 'id')->toArray()) // Ruoli dal DB
     * ->searchable() // Permette la ricerca
     * ->preload() // Precarica i risultati
     * ->placeholder('Select a role');
     * }
     */
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
