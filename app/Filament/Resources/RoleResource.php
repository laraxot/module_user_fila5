<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\RoleResource\Pages\CreateRole;
use Modules\User\Filament\Resources\RoleResource\Pages\EditRole;
use Modules\User\Filament\Resources\RoleResource\Pages\ListRoles;
use Modules\User\Models\Role;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $model = Role::class;

    #[Override]
=======
    protected static ?string $model = Role::class;

    #[\Override]
>>>>>>> f589f9b2 (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'guard_name' => TextInput::make('guard_name')->required()->maxLength(255),
            'enabled' => Toggle::make('enabled')->required(),
        ];
    }

<<<<<<< HEAD
    #[Override]
=======
    protected static ?string $model = Role::class;

    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
