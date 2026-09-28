<?php

declare(strict_types=1);

namespace Modules\User\Actions\Team;

use Modules\User\Models\TeamUser;
use Spatie\QueueableAction\QueueableAction;

class GetUserTeamsOptionAction
{
    use QueueableAction;

    /**
     * @return array<int|string, string>
     */
    public function execute(): array
    {
        $teams = TeamUser::with('team')->where('user_id', authId())->get();
        $result = [];
        foreach ($teams as $teamUser) {
<<<<<<< HEAD
            if ($teamUser->team !== null) {
=======
            if (null !== $teamUser->team) {
>>>>>>> laraxot/dev
                $result[(string) $teamUser->team->name] = (string) $teamUser->team->id;
            }
        }

        return $result;
    }
}
