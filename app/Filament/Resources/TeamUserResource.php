<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\TeamUser;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class TeamUserResource.
 */
final class TeamUserResource extends XotBaseResource
{
    protected static ?string $model = TeamUser::class;

    #[\Override]
    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['team', 'user']);
    }
}
