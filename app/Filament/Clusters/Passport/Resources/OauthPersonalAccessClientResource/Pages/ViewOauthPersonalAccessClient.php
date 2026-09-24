<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource;
<<<<<<< .merge_file_rBBHVp
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Schemas\OauthPersonalAccessClientInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Lz3SKf
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthPersonalAccessClient.
 */
class ViewOauthPersonalAccessClient extends XotBaseViewRecord
{
    protected static string $resource = OauthPersonalAccessClientResource::class;
<<<<<<< .merge_file_rBBHVp
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthPersonalAccessClientInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Lz3SKf
}
