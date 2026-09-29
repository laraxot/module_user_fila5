<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Base condivisa per i widget di autenticazione del modulo User.
 *
 * Il comportamento comune (schema, stato, validazione e accessibilità) è
 * centralizzato in XotBaseSchemaWidget e nella Form class specifica del widget.
 * Le sottoclassi devono limitarsi all'orchestrazione dell'azione di dominio.
 */
abstract class BaseAuthWidget extends XotBaseSchemaWidget
{
}
