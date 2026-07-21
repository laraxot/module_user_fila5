<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditOauthAccessToken extends XotBaseEditRecord
{
    protected static string $resource = OauthAccessTokenResource::class;

    /**
     * @return mixed
     */
    public static function getNavigationLabel(): string
    {
        return 'Edit Access Token';
    }

    /**
     * @return mixed
     */
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-pencil';
    }
}
