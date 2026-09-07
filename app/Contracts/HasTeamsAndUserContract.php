<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Modules\User\Contracts\TeamContract;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract
=======
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract.
>>>>>>> 2024e2e7 (.)
=======
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract.
>>>>>>> f589f9b2 (.)
 */
interface HasTeamsAndUserContract extends HasTeamsContract, UserContract
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene il ruolo dell'utente nel team
     */
    #[Override]
    public function teamRole(TeamContract $team): null|Role;

    /**
     * Verifica se l'utente può rimuovere un membro dal team
=======
=======
>>>>>>> f589f9b2 (.)
     * Ottiene il ruolo dell'utente nel team.
     */
    #[\Override]
    public function teamRole(TeamContract $team): ?Role;

    /**
     * Verifica se l'utente può rimuovere un membro dal team.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public function canRemoveTeamMember(Team $team, HasTeamsContract $user): bool;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Verifica se l'utente può aggiornare un membro del team
=======
     * Verifica se l'utente può aggiornare un membro del team.
>>>>>>> 2024e2e7 (.)
=======
     * Verifica se l'utente può aggiornare un membro del team.
>>>>>>> f589f9b2 (.)
     */
    public function canUpdateTeamMember(Team $team, HasTeamsContract $user): bool;
}
