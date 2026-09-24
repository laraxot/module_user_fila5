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
        $shieldData = FilamentShieldData::make();
        $superAdminConfig = $shieldData->super_admin;

        return [
            'enabled' => $this->toBoolean($superAdminConfig->enabled ?? false),
            'name' => $this->toString($superAdminConfig->name ?? 'Super Admin'),
            'defined_via_gate' => $this->toBoolean($superAdminConfig->define_via_gate ?? false),
            'gate_interception_status' => $this->toString($superAdminConfig->intercept_gate ?? 'block'),
        ];
    }

<<<<<<< .merge_file_ZQdcKs
<<<<<<< HEAD
<<<<<<< .merge_file_Nj6mmK
=======
<<<<<<< .merge_file_TM7Xgh
=======
<<<<<<< .merge_file_o2VeAB
>>>>>>> .merge_file_p7o6qL
>>>>>>> df2ba808 (.)
    private function toBoolean(mixed $value): bool
    {
        return is_bool($value) ? $value : false;
    }

    private function toString(mixed $value): string
    {
        return is_string($value) ? $value : '';
<<<<<<< HEAD
=======
<<<<<<< .merge_file_TM7Xgh
=======
>>>>>>> df2ba808 (.)
=======
=======
>>>>>>> .merge_file_5eEEEe
    private function toBoolean(bool $value): bool
    {
        return $value;
    }

    private function toString(string $value): string
    {
        return $value;
<<<<<<< .merge_file_ZQdcKs
<<<<<<< HEAD
>>>>>>> .merge_file_rwgIoa
=======
>>>>>>> .merge_file_KFtagk
>>>>>>> .merge_file_p7o6qL
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_5eEEEe
    }
}
