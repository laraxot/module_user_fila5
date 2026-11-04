<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Filament\Forms\Components\Toggle;
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
<<<<<<< HEAD
            'enabled' => Toggle::make('enabled')->default(true)->required(),
=======
            'registration_enabled' => Toggle::make('registration_enabled')->default(true),
            'email_verification_required' => Toggle::make('email_verification_required')->default(true),
>>>>>>> c1257e0346954430c15cc387a2760889e222e4b9
        ];
    }
}
