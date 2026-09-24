<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Schemas\OauthAccessTokenInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAccessToken extends XotBaseViewRecord
{
    protected static string $resource = OauthAccessTokenResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAccessTokenInfolist::class)->getInfolistSchema();
    }
}
