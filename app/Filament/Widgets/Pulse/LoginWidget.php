<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Pulse;

use Filament\Widgets\Widget;

/**
 * Card statistiche accessi basata su authentication_logs.
 *
 * Pulse nativo conserva al massimo 7 giorni (trim + preaggregazione),
 * quindi lo storico completo viene letto da AuthenticationLog tramite
 * GetLoginStatsAction. La serie live 1h-7g resta su Pulse::graph nel
 * percorso di backfill/record (RecordLoginPulseAction).
 */
class LoginWidget extends Widget
{
    protected string $view = 'user::filament.widgets.pulse.login-widget';

    protected int|string|array $columnSpan = 'full';
}
