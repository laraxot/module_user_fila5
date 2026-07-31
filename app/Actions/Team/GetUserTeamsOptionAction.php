<?php

declare(strict_types=1);

namespace Modules\User\Actions\Team;

use Modules\Xot\Actions\Cast\SafeStringCastAction;

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
            if (null === $team) {
                continue;
            }

            $key = $team->getKey();
            $name = $team->getAttribute('name');
<<<<<<< .merge_file_7rmKrS
            $options[is_string($key) ? $key : SafeStringCastAction::cast($key)] = SafeStringCastAction::cast($name);
=======
<<<<<<< HEAD
            $options[is_string($key) ? $key : (string) $key] = is_string($name) ? $name : (string) $name;
=======
            $options[is_string($key) ? $key : SafeStringCastAction::cast($key)] = SafeStringCastAction::cast($name);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_TtyLvK
        }

        return $options;
    }
}
