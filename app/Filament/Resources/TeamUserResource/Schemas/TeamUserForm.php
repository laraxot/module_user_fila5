<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Component as SchemaComponent;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
=======
use Filament\Schemas\Components\Component as SchemaComponent;
use Modules\Xot\Filament\Forms\Components\XotBaseSelect;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;
>>>>>>> 350420cb (Check & fix styling)

class TeamUserForm extends XotBaseResourceForm
{
    /**
     * @return array<int|string, SchemaComponent>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
    {
        return [
            'team_user' => Section::make('Team User Information')
                ->schema([
                    'team_id' => Select::make('team_id')
=======
    public static function getFormSchema(): array
    {
        return [
            'team_user' => XotBaseSection::make('Team User Information')
                ->schema([
                    'team_id' => XotBaseSelect::make('team_id')
>>>>>>> 350420cb (Check & fix styling)
                        ->label('Team')
                        ->relationship('team', 'name')
                        ->required()
                        ->searchable(),
<<<<<<< HEAD
                    'user_id' => Select::make('user_id')
=======
                    'user_id' => XotBaseSelect::make('user_id')
>>>>>>> 350420cb (Check & fix styling)
                        ->label('User')
                        ->relationship('user', 'name')
                        ->required()
                        ->searchable(),
<<<<<<< HEAD
                    'role' => Select::make('role')
=======
                    'role' => XotBaseSelect::make('role')
>>>>>>> 350420cb (Check & fix styling)
                        ->label('Role')
                        ->options([
                            'admin' => 'Admin',
                            'member' => 'Member',
                            'viewer' => 'Viewer',
                        ])
                        ->required()
                        ->searchable()
                        ->helperText('Role of the user in the team'),
                ])
                ->columns(2),
        ];
    }
}
