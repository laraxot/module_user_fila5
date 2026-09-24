<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Pages;

use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\AuthenticationLogResource;
<<<<<<< .merge_file_fBk6g0
<<<<<<< HEAD
use Modules\User\Filament\Resources\AuthenticationLogResource\Schemas\AuthenticationLogInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_1Sqj0c
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewAuthenticationLog extends XotBaseViewRecord
{
    protected static string $resource = AuthenticationLogResource::class;

    /*
     * @return array<string, Component>
     */
<<<<<<< .merge_file_fBk6g0
<<<<<<< HEAD

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(AuthenticationLogInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_1Sqj0c
}
