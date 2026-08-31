<?php

declare(strict_types=1);

namespace Modules\User\Actions\Shield;

use Modules\User\Datas\FilamentShieldData;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per risolvere la configurazione filament user.
 *
 * Raggruppa: isFilamentUserRoleEnabled, getFilamentUserRoleName
 */
class ResolveFilamentUserConfigurationAction
{
    use QueueableAction;

    /**
     * Execute the action to resolve filament user configuration.
     *
     * @return array{
     *     enabled: bool,
     *     name: string,
     * }
     */
    public function execute(): array
    {
        $filamentUserConfig = FilamentShieldData::make()->filament_user;

        return [
            'enabled' => $filamentUserConfig->enabled,
            'name' => $filamentUserConfig->name,
        ];
    }
}
