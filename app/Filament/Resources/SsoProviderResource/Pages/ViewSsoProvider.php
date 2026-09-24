<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SsoProviderResource\Pages;

use Modules\User\Filament\Resources\SsoProviderResource;
<<<<<<< .merge_file_xytAyV
<<<<<<< HEAD
use Modules\User\Filament\Resources\SsoProviderResource\Schemas\SsoProviderInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_ilEQSW
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSsoProvider extends XotBaseViewRecord
{
    protected static string $resource = SsoProviderResource::class;
<<<<<<< .merge_file_xytAyV
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
>>>>>>> .merge_file_ilEQSW
}
