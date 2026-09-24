<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Modules\User\Filament\Resources\BaseProfileResource;
<<<<<<< HEAD
use Modules\User\Filament\Resources\BaseProfileResource\Schemas\BaseProfileInfolist;
=======
>>>>>>> df2ba808 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewProfile extends XotBaseViewRecord
{
    protected static string $resource = BaseProfileResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(BaseProfileInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
}
