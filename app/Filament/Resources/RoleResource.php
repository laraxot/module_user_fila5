<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Override;
=======
>>>>>>> 2024e2e7 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\RoleResource\Pages\CreateRole;
use Modules\User\Filament\Resources\RoleResource\Pages\EditRole;
use Modules\User\Filament\Resources\RoleResource\Pages\ListRoles;
use Modules\User\Models\Role;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static null|string $model = Role::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'guard_name' => TextInput::make('guard_name')->required()->maxLength(255),
            'enabled' => Toggle::make('enabled')->required(),
        ];
    }

    #[Override]
=======
    protected static ?string $model = Role::class;

    #[\Override]
>>>>>>> 2024e2e7 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
