<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Modules\Xot\Filament\Pages\BaseSettingPage;

use Filament\Forms\Components\Toggle;
use Modules\User\Datas\UserConfigData;

/**
 * Impostazioni di User (`config/{tenant}/user.php`), solo super-admin.
 *
 * Form configurato con i campi esposti da UserConfigData.
 *
 * @see UserConfigData
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true)->required(),
            'registration_enabled' => Toggle::make('registration_enabled')->default(true),
            'email_verification_required' => Toggle::make('email_verification_required')->default(true),
        ];
    }
}
