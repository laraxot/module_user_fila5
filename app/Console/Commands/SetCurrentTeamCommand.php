<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Console\Command;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
=======
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
>>>>>>> f589f9b2 (.)

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Datas\XotData;

>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Datas\XotData;

>>>>>>> f589f9b2 (.)
/**
 * Comando per impostare il team corrente per un utente.
 */
class SetCurrentTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $name = 'user:set-current-team';

    /**
     * The console command description.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $description = 'Assign current team to user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
        if (empty($email)) {
            $this->error('Email non valida!');
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return;
        }

        $xot = XotData::make();
        $user = $xot->getUserByEmail($email);

<<<<<<< HEAD
<<<<<<< HEAD
        if (!($user instanceof Model)) {
            $this->error('Utente non trovato o non valido!');
=======
        if (! $user instanceof Model) {
            $this->error('Utente non trovato o non valido!');

>>>>>>> 2024e2e7 (.)
=======
        if (! $user instanceof Model) {
            $this->error('Utente non trovato o non valido!');

>>>>>>> f589f9b2 (.)
            return;
        }

        $teamClass = $xot->getTeamClass();
<<<<<<< HEAD
<<<<<<< HEAD
        if (!class_exists($teamClass)) {
            $this->error('Classe team non trovata!');
=======
        if (! class_exists($teamClass)) {
            $this->error('Classe team non trovata!');

>>>>>>> 2024e2e7 (.)
=======
        if (! class_exists($teamClass)) {
            $this->error('Classe team non trovata!');

>>>>>>> f589f9b2 (.)
            return;
        }

        /** @var array<int|string, string> */
        $opts = $teamClass::pluck('name', 'id')->toArray();

        if (empty($opts)) {
            $this->error('Nessun team disponibile!');
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return;
        }

        $team_id = select(
            label: 'Quale team?',
            options: $opts,
            required: true,
            scroll: 10,
        );

<<<<<<< HEAD
<<<<<<< HEAD
        if (!is_numeric($team_id)) {
            $this->error('ID team non valido!');
=======
        if (! is_numeric($team_id)) {
            $this->error('ID team non valido!');

>>>>>>> 2024e2e7 (.)
=======
        if (! is_numeric($team_id)) {
            $this->error('ID team non valido!');

>>>>>>> f589f9b2 (.)
            return;
        }

        try {
<<<<<<< HEAD
<<<<<<< HEAD
            $user->current_team_id = (int) $team_id;
            $user->save();
            $this->info('OK');
        } catch (Exception $e) {
            $this->error('Errore durante il salvataggio: ' . $e->getMessage());
        }
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
=======
=======
>>>>>>> f589f9b2 (.)
            $user->current_team_id = (string) $team_id;
            $user->save();
            $this->info('OK');
        } catch (\Exception $e) {
            $this->error('Errore durante il salvataggio: '.$e->getMessage());
        }
    }

    /*
     * Get the console command options.
     */
    // protected function getOptions(): array
    // {
    //    return [
    //        ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
    //    ];
    // }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
