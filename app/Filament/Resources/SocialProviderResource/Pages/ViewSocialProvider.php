<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\User\Filament\Resources\SocialProviderResource\Schemas\SocialProviderInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialProvider extends XotBaseViewRecord
{
    protected static string $resource = SocialProviderResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(SocialProviderInfolist::class)->getInfolistSchema();
    }
}
