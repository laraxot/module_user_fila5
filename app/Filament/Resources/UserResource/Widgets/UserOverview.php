<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Widgets;

<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class UserOverview extends XotBaseWidget
{
    public ?Model $record = null;

    protected string $view = 'user::filament.resources.user-resource.widgets.user-overview';
<<<<<<< HEAD
=======

    /**
     * @return array<int|string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }
>>>>>>> laraxot/dev
}
