<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
<<<<<<< HEAD
use Filament\Widgets\Widget;
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 2024e2e7 (.)

/**
 * Simple widget used to verify page filters behaviour (shows start/end dates).
 */
<<<<<<< HEAD
class UserWidget extends Widget
{
    use InteractsWithPageFilters;
=======
class UserWidget extends XotBaseWidget
{
    use InteractsWithPageFilters;

>>>>>>> 2024e2e7 (.)
    protected static bool $isLazy = false;

    protected string $view = 'user::filament.resources.user.widgets.user-widget';

<<<<<<< HEAD
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


=======
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    public function getViewData(): array
    {
        /** @var array<string, mixed>|null $data */
        $data = $this->pageFilters;

        // PHPStan Level 10: Ensure we always return array
        return $data ?? [];
    }
}
>>>>>>> 2024e2e7 (.)
