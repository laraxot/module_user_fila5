<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Filament\Forms\Components\Toggle;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di User (`config/{tenant}/user.php`), solo super-admin. Pagina senza campi: la
 * convenzione (Data, file del tenant, accesso) sta in BaseSettingPage e in
 * \Modules\User\Datas\UserConfigData.
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'registration_enabled' => Toggle::make('registration_enabled')->default(true),
            'email_verification_required' => Toggle::make('email_verification_required')->default(true),
        ];
    }
}
