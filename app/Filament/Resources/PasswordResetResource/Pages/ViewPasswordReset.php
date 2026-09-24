<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Pages;

use Modules\User\Filament\Resources\PasswordResetResource;
<<<<<<< .merge_file_r62E1Y
<<<<<<< HEAD
use Modules\User\Filament\Resources\PasswordResetResource\Schemas\PasswordResetInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_dVLoyI
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPasswordReset extends XotBaseViewRecord
{
    protected static string $resource = PasswordResetResource::class;
<<<<<<< .merge_file_r62E1Y
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(PasswordResetInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_dVLoyI
}
