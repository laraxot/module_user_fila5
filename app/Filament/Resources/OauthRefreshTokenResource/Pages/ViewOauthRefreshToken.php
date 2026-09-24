<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;

use Modules\User\Filament\Resources\OauthRefreshTokenResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\User\Filament\Resources\OauthRefreshTokenResource\Schemas\OauthRefreshTokenInfolist;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthRefreshTokenInfolist::class)->getInfolistSchema();
    }
}
