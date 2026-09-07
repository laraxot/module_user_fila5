<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

<<<<<<< HEAD
<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Collection;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Support\Collection;
>>>>>>> f589f9b2 (.)
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
=======
    /** @var array<int, array<string, mixed>> */
>>>>>>> 2024e2e7 (.)
=======
    /** @var array<int, array<string, mixed>> */
>>>>>>> f589f9b2 (.)
    public array $teams = [];

    public XotData $xot;

<<<<<<< HEAD
<<<<<<< HEAD
    /** @var UserContract */
    public $user;
=======
    public UserContract $user;
>>>>>>> 2024e2e7 (.)
=======
    public UserContract $user;
>>>>>>> f589f9b2 (.)

    public function mount(): void
    {
        $this->xot = XotData::make();
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::notNull($authUser = Filament::auth()->user(), '[' . __LINE__ . '][' . class_basename($this) . ']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (!($authUser instanceof UserContract)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        $this->teams = $this->user->allTeams()->toArray();
=======
=======
>>>>>>> f589f9b2 (.)
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
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
        if (!$this->user->switchTeam($team)) {
            abort(403);
        }
        if ($team !== null) {
=======
=======
>>>>>>> f589f9b2 (.)
        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
        if ($this->teams === []) {
=======
        if ([] === $this->teams) {
>>>>>>> 2024e2e7 (.)
=======
        if ([] === $this->teams) {
>>>>>>> f589f9b2 (.)
            $view = 'ui::livewire.empty';
        }

        return view($view, $view_params);
    }
}
