<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
=======
use Modules\User\Models\Role;
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;

/**
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract.
 */
interface HasTeamsAndUserContract extends HasTeamsContract, UserContract
{
<<<<<<< HEAD
=======
    /**
     */
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
    public function canRemoveTeamMember(Team $team, HasTeamsContract $user): bool;

    /**
     * Verifica se l'utente può aggiornare un membro del team.
     */
    public function canUpdateTeamMember(Team $team, HasTeamsContract $user): bool;
}
