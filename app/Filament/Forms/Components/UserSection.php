<?php

declare(strict_types=1);

/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\User\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Section;

class UserSection extends Section
{
    public static function getDefaultName(): ?string
    {
        return 'user';
    }

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

class UserSection extends XotBaseSection
{
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected function setUp(): void
    {
        parent::setUp();

        $this->schema([
            Grid::make(4)->schema([
                // TextInput::make('ente'),
                // TextInput::make('matr'),
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                TextInput::make('email'),
            ]),
        ]);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)

    public static function getDefaultName(): ?string
    {
        return 'user';
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
