<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Widgets;

use Laravel\Passport\Client;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class ClientHeader extends XotBaseWidget
{
<<<<<<< HEAD
    protected string $view = 'user::filament.resources.client-resource.widgets.client-header';

    public Client $client;

=======
    public Client $client;

    protected string $view = 'user::filament.resources.client-resource.widgets.client-header';

>>>>>>> 2024e2e7 (.)
    protected int|string|array $columnSpan = 'full';

    public function mount(Client $record): void
    {
        $this->client = $record;
    }

    public function getFormSchema(): array
    {
        return [];
    }
}
