<?php

declare(strict_types=1);

namespace Modules\User\Actions\Team;

use Modules\User\Models\TeamUser;
use Spatie\QueueableAction\QueueableAction;

class GetUserTeamsOptionAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * @return array<int|string, string>
     */
    public function execute(): array
    {
        $teams = TeamUser::with('team')->where('user_id', authId())->get();
        $result = [];
        foreach ($teams as $teamUser) {
            if ($teamUser->team !== null) {
                $result[(string) $teamUser->team->name] = (string) $teamUser->team->id;
            }
        }

        return $result;
=======
    /** @return array<int|string, string> */
    public function execute(): array
    {
        $teams = TeamUser::where('user_id', authId())->get();

        /** @var array<int|string, string> $options */
        $options = ['' => '--- Select ---'];

        foreach ($teams as $teamUser) {
            $team = $teamUser->team;
            if (null === $team) {
                continue;
            }

            $options[(string) $team->getKey()] = (string) $team->getAttribute('name');
        }

        return $options;
>>>>>>> 350420cb (Check & fix styling)
    }
}
