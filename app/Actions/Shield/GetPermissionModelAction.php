<?php

declare(strict_types=1);

namespace Modules\User\Actions\Shield;

use Spatie\QueueableAction\QueueableAction;

final class GetPermissionModelAction
{
    use QueueableAction;

    public function execute(): string
    {
        $res = config('permission.models.permission', 'Spatie\Permission\Models\Permission');

        return is_string($res) ? $res : 'Spatie\Permission\Models\Permission';
    }
}
