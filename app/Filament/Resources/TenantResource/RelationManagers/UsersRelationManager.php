<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;

class UsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;

    protected static string $relationship = 'users';

    protected static null|string $recordTitleAttribute = 'name';
=======
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> 2024e2e7 (.)

    /**
     * @return array<Component>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            DateTimePicker::make('email_verified_at')->nullable(),
            TextInput::make('password')
                ->password()
<<<<<<< HEAD
                ->required(fn($context) => $context === 'create')
=======
                ->required(fn ($context) => 'create' === $context)
>>>>>>> 2024e2e7 (.)
                ->minLength(8)
                ->same('password_confirmation')
                ->dehydrated(filled(...))
                ->dehydrateStateUsing(bcrypt(...)),
            TextInput::make('password_confirmation')
                ->password()
<<<<<<< HEAD
                ->required(fn($context) => $context === 'create')
=======
                ->required(fn ($context) => 'create' === $context)
>>>>>>> 2024e2e7 (.)
                ->minLength(8),
        ];
    }

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable()->toggleable(),
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->toggleable(),
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->toggleable(),
            'email_verified_at' => TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
        ];
    }
}
