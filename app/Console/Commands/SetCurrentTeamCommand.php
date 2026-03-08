<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;

/**
 * Comando per impostare il team corrente per un utente.
 */
class SetCurrentTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:set-current-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign current team to user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
        if (empty($email)) {
            // @var mixed error('Email non valida!';

            return;
        }

        $xot = XotData::make();
        $user = $xot->getUserByEmail($email);

        if (! $user instanceof Model) {
            // @var mixed error('Utente non trovato o non valido!';

            return;
        }

        $teamClass = $xot->getTeamClass();
        if (! class_exists($teamClass)) {
            // @var mixed error('Classe team non trovata!';

            return;
        }

        /** @var array<int|string, string> */
        $opts = $teamClass::pluck('name', 'id')->toArray();

        if (empty($opts)) {
            // @var mixed error('Nessun team disponibile!';

            return;
        }

        $team_id = select(
            label: 'Quale team?',
            options: $opts,
            required: true,
            scroll: 10,
        );

        if (! is_numeric($team_id)) {
            // @var mixed error('ID team non valido!';

            return;
        }

        try {
            $user->current_team_id = (string) $team_id;
            $user->save();
            // @var mixed info('OK';
        } catch (\Exception $e) {
            // @var mixed error('Errore durante il salvataggio: '.$e->getMessage(;
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
}
