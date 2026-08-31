<?php

declare(strict_types=1);

namespace Modules\User\Actions\Notification;

use Illuminate\Support\Facades\Schema;
use Modules\User\Models\Notification;
use Spatie\QueueableAction\QueueableAction;

/**
 * Verifica che la tabella notifications esista sulla connection User prima di query FO.
 */
final class IsNotificationSchemaReadableAction
{
    use QueueableAction;

    public function execute(): bool
    {
        $model = new Notification();

        $connection = $model->getConnectionName();
<<<<<<< HEAD
        if (! is_string($connection) || $connection === '') {
=======
        if (! is_string($connection) || '' === $connection) {
>>>>>>> laraxot/dev
            $default = config('database.default');
            $connection = is_string($default) ? $default : 'mysql';
        }

        return Schema::connection($connection)->hasTable($model->getTable());
    }
}
