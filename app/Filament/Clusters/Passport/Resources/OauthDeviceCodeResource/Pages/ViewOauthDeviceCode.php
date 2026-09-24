<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource;
use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Schemas\OauthDeviceCodeInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthDeviceCode extends XotBaseViewRecord
{
    protected static string $resource = OauthDeviceCodeResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthDeviceCodeInfolist::class)->getInfolistSchema();
    }
}
