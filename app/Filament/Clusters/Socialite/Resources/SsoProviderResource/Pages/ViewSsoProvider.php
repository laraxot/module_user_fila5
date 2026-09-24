<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Pages;

use Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource;
<<<<<<< .merge_file_nRMeTr
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Schemas\SsoProviderInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_nGB6AV
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSsoProvider extends XotBaseViewRecord
{
    protected static string $resource = SsoProviderResource::class;
<<<<<<< .merge_file_nRMeTr
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(SsoProviderInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_nGB6AV
}
