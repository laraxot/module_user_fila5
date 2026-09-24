<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;

use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\User\Filament\Resources\OauthAuthCodeResource\Schemas\OauthAuthCodeInfolist;

class ViewOauthAuthCode extends XotBaseViewRecord
{
    protected static string $resource = OauthAuthCodeResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAuthCodeInfolist::class)->getInfolistSchema();
    }
}
