<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Pages;

use Filament\Actions\Action;
use Modules\User\Filament\Resources\SocialiteUserResource;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListSocialiteUsers.
 */
=======
/**
 * Class ListSocialiteUsers.
 */
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

>>>>>>> laraxot/dev
class ListSocialiteUsers extends XotBaseListRecords
{
    protected static string $resource = SocialiteUserResource::class;

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            // Socialite users are typically created through authentication, so no create action
            // CreateAction::make(),
        ];
    }
}
