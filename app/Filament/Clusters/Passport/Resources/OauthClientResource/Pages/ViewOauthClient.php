<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource;
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Schemas\OauthClientInfolist;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthClient.
 */
class ViewOauthClient extends XotBaseViewRecord
{
    protected static string $resource = OauthClientResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthClientInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> laraxot/dev
}
