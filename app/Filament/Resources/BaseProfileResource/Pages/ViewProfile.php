<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\User\Filament\Resources\BaseProfileResource\Schemas\BaseProfileInfolist;

class ViewProfile extends XotBaseViewRecord
{
    protected static string $resource = BaseProfileResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(BaseProfileInfolist::class)->getInfolistSchema();
    }
}
