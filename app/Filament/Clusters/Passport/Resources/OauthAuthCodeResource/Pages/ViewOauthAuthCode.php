<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource;
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource\Schemas\OauthAuthCodeInfolist;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAuthCode extends XotBaseViewRecord
{
    protected static string $resource = OauthAuthCodeResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAuthCodeInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> laraxot/dev
}
