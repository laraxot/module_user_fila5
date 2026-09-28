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
<<<<<<< HEAD
        $model = new Notification;

        $connection = $model->getConnectionName();
        if (! is_string($connection) || $connection === '') {
=======
        $model = new Notification();

        $connection = $model->getConnectionName();
        if (! is_string($connection) || '' === $connection) {
>>>>>>> laraxot/dev
            $default = config('database.default');
            $connection = is_string($default) ? $default : 'mysql';
        }

        return Schema::connection($connection)->hasTable($model->getTable());
    }
}
