<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di User (`config/{tenant}/user.php`), solo super-admin. Pagina senza campi: la
 * convenzione (Data, file del tenant, accesso) sta in BaseSettingPage e in
 * \Modules\User\Datas\UserConfigData.
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, never>
     */
    protected function getFormSchema(): array
    {
        return [];
    }
}
