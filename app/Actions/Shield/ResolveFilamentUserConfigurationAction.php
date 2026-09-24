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
        $shieldData = FilamentShieldData::make();
        $filamentUserConfig = $shieldData->filament_user;

        return [
            'enabled' => $this->toBoolean($filamentUserConfig->enabled ?? false),
            'name' => $this->toString($filamentUserConfig->name ?? 'Filament User'),
        ];
    }

<<<<<<< .merge_file_WgzDbK
=======
<<<<<<< .merge_file_IQflNg
>>>>>>> .merge_file_mGcD9o
    private function toBoolean(mixed $value): bool
    {
        return is_bool($value) ? $value : false;
    }

    private function toString(mixed $value): string
    {
        return is_string($value) ? $value : '';
<<<<<<< .merge_file_WgzDbK
=======
=======
    private function toBoolean(bool $value): bool
    {
        return $value;
    }

    private function toString(string $value): string
    {
        return $value;
>>>>>>> .merge_file_meANDf
>>>>>>> .merge_file_mGcD9o
    }
}
