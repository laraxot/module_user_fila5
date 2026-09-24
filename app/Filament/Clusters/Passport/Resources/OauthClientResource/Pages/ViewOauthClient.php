<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource;
<<<<<<< .merge_file_wg57ZO
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Schemas\OauthClientInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_BHsjW0
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthClient.
 */
class ViewOauthClient extends XotBaseViewRecord
{
    protected static string $resource = OauthClientResource::class;
<<<<<<< .merge_file_wg57ZO
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
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_BHsjW0
}
