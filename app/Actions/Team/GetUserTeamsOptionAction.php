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
<<<<<<< HEAD
        $teams = TeamUser::with('team')->where('user_id', authId())->get();
        $result = [];
        foreach ($teams as $teamUser) {
            if (null !== $teamUser->team) {
                $result[(string) $teamUser->team->name] = (string) $teamUser->team->id;
            }
        }

        return $result;
=======
        $teams = TeamUser::where('user_id', authId())->get();

        /** @var array<int|string, string> $options */
        $options = ['' => '--- Select ---'];

        foreach ($teams as $teamUser) {
            $team = $teamUser->team;
            if (null === $team) {
                continue;
            }

            $key = $team->getKey();
            if (! \is_int($key) && ! \is_string($key)) {
                continue;
            }

            $options[(string) $key] = $team->name;
        }

        return $options;
>>>>>>> laraxot/dev
    }
}
