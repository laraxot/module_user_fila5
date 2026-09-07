<?php

declare(strict_types=1);

namespace Modules\User\Actions\Team;

use Modules\User\Models\TeamUser;
use Spatie\QueueableAction\QueueableAction;

class GetUserTeamsOptionAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<int|string, string>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<int|string, string>
     */
>>>>>>> f589f9b2 (.)
    public function execute(): array
    {
        $teams = TeamUser::where('user_id', authId())->get();

<<<<<<< HEAD
<<<<<<< HEAD
        return ['' => '--- Select ---'] + $teams->pluck('team.name', 'team.id')->toArray();
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var array<int|string, string> $options */
        $options = ['' => '--- Select ---'];

        foreach ($teams as $teamUser) {
            $team = $teamUser->team;
            if ($team === null) {
                continue;
            }

            $key = $team->getKey();
            if (! \is_int($key) && ! \is_string($key)) {
                continue;
            }

            $options[(string) $key] = $team->name;
        }

        return $options;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
