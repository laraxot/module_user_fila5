<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\RoleResource\Pages\CreateRole;
use Modules\User\Filament\Resources\RoleResource\Pages\EditRole;
use Modules\User\Filament\Resources\RoleResource\Pages\ListRoles;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< .merge_file_hoSB3c
use Filament\Forms\Components\Field;
=======

>>>>>>> .merge_file_0rOJ8u
class RoleResource extends XotBaseResource
{
    protected static ?string $model = Role::class;

<<<<<<< .merge_file_hoSB3c
    //#[\Override]
=======
    // #[\Override]
>>>>>>> .merge_file_0rOJ8u
    /**
     * @return array<string, mixed>
     */
    public static function getFormSchemaOld(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'guard_name' => TextInput::make('guard_name')->required()->maxLength(255),
            'enabled' => Toggle::make('enabled')->required(),
        ];
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
