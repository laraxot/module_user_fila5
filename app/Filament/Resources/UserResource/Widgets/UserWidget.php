<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\Widget;

/**
 * Simple widget used to verify page filters behaviour (shows start/end dates).
 */
class UserWidget extends Widget
{
    use InteractsWithPageFilters;
    protected static bool $isLazy = false;

    protected string $view = 'user::filament.resources.user.widgets.user-widget';

    /*
    public function getStartDateProperty(): ?string
    {
        return \data_get($this->pageFilters, 'startDate');
    }

    public function getEndDateProperty(): ?string
    {
        return \data_get($this->pageFilters, 'endDate');
    }
        */

        public function getViewData(): array
        {
            $data=$this->pageFilters;
            return $data;
        }
}


