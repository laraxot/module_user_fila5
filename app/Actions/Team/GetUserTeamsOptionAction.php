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
        $teams = TeamUser::where('user_id', authId())->get();

        /** @var array<int|string, string> $options */
        $options = ['' => '--- Select ---'];

        foreach ($teams as $teamUser) {
            $team = $teamUser->team;
<<<<<<< HEAD
            if (null === $team) {
=======
<<<<<<< .merge_file_28aF65
            if (null === $team) {
=======
<<<<<<< HEAD
            if ($team === null) {
=======
            if (null === $team) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_2EaYdq
>>>>>>> laraxot/dev
                continue;
            }

            $key = $team->getKey();
            if (! \is_int($key) && ! \is_string($key)) {
                continue;
            }

            $options[(string) $key] = $team->name;
        }

        return $options;
    }
}
