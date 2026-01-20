<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
=======
use Override;
use Modules\User\Contracts\TeamContract;
>>>>>>> f548be94 (.)
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;

/**
<<<<<<< HEAD
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract.
=======
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract
>>>>>>> f548be94 (.)
 */
interface HasTeamsAndUserContract extends HasTeamsContract, UserContract
{
    /**
<<<<<<< HEAD
     * Ottiene il ruolo dell'utente nel team.
     */
    #[\Override]
    public function teamRole(TeamContract $team): ?Role;

    /**
     * Verifica se l'utente può rimuovere un membro dal team.
=======
     * Ottiene il ruolo dell'utente nel team
     */
    #[Override]
    public function teamRole(TeamContract $team): null|Role;

    /**
     * Verifica se l'utente può rimuovere un membro dal team
>>>>>>> f548be94 (.)
     */
    public function canRemoveTeamMember(Team $team, HasTeamsContract $user): bool;

    /**
<<<<<<< HEAD
     * Verifica se l'utente può aggiornare un membro del team.
=======
     * Verifica se l'utente può aggiornare un membro del team
>>>>>>> f548be94 (.)
     */
    public function canUpdateTeamMember(Team $team, HasTeamsContract $user): bool;
}
