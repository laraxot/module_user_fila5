<?php

declare(strict_types=1);

namespace Modules\User\Actions\Shield;

use Modules\User\Datas\FilamentShieldData;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per risolvere la configurazione super admin.
 *
 * Raggruppa: isSuperAdminEnabled, getSuperAdminName, isSuperAdminDefinedViaGate,
 * getSuperAdminGateInterceptionStatus
 */
class ResolveSuperAdminConfigurationAction
{
    use QueueableAction;

    /**
     * Execute the action to resolve super admin configuration.
     *
     * @return array{
     *     enabled: bool,
     *     name: string,
     *     defined_via_gate: bool,
     *     gate_interception_status: string,
     * }
     */
    public function execute(): array
    {
        $superAdminConfig = FilamentShieldData::make()->super_admin;

        return [
            'enabled' => $superAdminConfig->enabled,
            'name' => $superAdminConfig->name,
            'defined_via_gate' => $superAdminConfig->define_via_gate,
            'gate_interception_status' => $superAdminConfig->intercept_gate,
        ];
    }
}
