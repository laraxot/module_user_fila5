<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Widgets;

use Laravel\Passport\Client;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class ClientHeader extends XotBaseWidget
{
<<<<<<< HEAD
    public Client $client;

    /** @var view-string */
    protected string $view;

=======
    protected string $view = 'user::filament.resources.client-resource.widgets.client-header';

    public Client $client;

>>>>>>> 350420cb (Check & fix styling)
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
