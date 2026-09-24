<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 350420cb (Check & fix styling)
/*
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\User\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
<<<<<<< HEAD
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

class UserSection extends XotBaseSection
{
=======
use Filament\Schemas\Components\Section;

class UserSection extends Section
{
    public static function getDefaultName(): ?string
    {
        return 'user';
    }

>>>>>>> 350420cb (Check & fix styling)
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

    public static function getDefaultName(): ?string
    {
        return 'user';
    }
=======
>>>>>>> 350420cb (Check & fix styling)
}
