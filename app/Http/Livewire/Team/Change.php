<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> f548be94 (.)
=======
use InvalidArgumentException;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Support\Collection;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Illuminate\Support\Collection;
>>>>>>> laraxot/dev
use Illuminate\View\View;
use Livewire\Component;
use Modules\User\Contracts\TeamContract;
use Modules\User\Events\TeamSwitched;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class Change extends Component
{
    // use HasUserProperty;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var array<int, array<string, mixed>> */
=======
>>>>>>> f548be94 (.)
=======
=======
    /** @var array<int, array<string, mixed>> */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    /** @var array<int, array<string, mixed>> */
>>>>>>> laraxot/dev
    public array $teams = [];

    public XotData $xot;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public UserContract $user;
=======
    /** @var UserContract */
    public $user;
>>>>>>> f548be94 (.)
=======
    /** @var UserContract */
    public $user;
=======
    public UserContract $user;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    public UserContract $user;
>>>>>>> laraxot/dev

    public function mount(): void
    {
        $this->xot = XotData::make();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        Assert::notNull($authUser = Filament::auth()->user(), '['.__LINE__.']['.class_basename($this).']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (! $authUser instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        /** @var Collection<int, TeamContract> $allTeams */
        $allTeams = $this->user->allTeams();
        $this->teams = $allTeams
            ->values()
            ->map(static fn (TeamContract $team): array => $team->toArray())
            ->all();
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        Assert::notNull($authUser = Filament::auth()->user(), '[' . __LINE__ . '][' . class_basename($this) . ']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (!($authUser instanceof UserContract)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        $this->teams = $this->user->allTeams()->toArray();
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        Assert::notNull($authUser = Filament::auth()->user(), '['.__LINE__.']['.class_basename($this).']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (! $authUser instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        /** @var Collection<int, TeamContract> $allTeams */
        $allTeams = $this->user->allTeams();
        $this->teams = $allTeams
            ->values()
            ->map(static fn (TeamContract $team): array => $team->toArray())
            ->all();
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }

    /**
     * Update the authenticated user's current team.
     */
    public function switchTeam(int $teamId): Application|RedirectResponse|Redirector
    {
        $teamClass = $this->xot->getTeamClass();
        /** @var TeamContract */
        $team = $teamClass::firstWhere(['id' => $teamId]);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        if (!$this->user->switchTeam($team)) {
            abort(403);
        }
        if ($team !== null) {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
            // TeamSwitched::dispatch($team->fresh(), $this->user);
            TeamSwitched::dispatch($team, $this->user);
        }
        Notification::make()
            ->title(__('Team switched'))
            ->success()
            ->send();
        /**
         * @var string|null
         */
        $path = config('filament.path');

        return redirect($path, 303);
    }

    public function render(): View
    {
        $view = 'user::livewire.team.change';
        $view_params = [
            'view' => $view,
        ];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if ([] === $this->teams) {
=======
        if ($this->teams === []) {
>>>>>>> f548be94 (.)
=======
        if ($this->teams === []) {
=======
        if ([] === $this->teams) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
        if ([] === $this->teams) {
>>>>>>> laraxot/dev
            $view = 'ui::livewire.empty';
        }

        return view($view, $view_params);
    }
}
