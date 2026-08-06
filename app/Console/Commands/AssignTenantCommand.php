<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
=======
use Illuminate\Support\Collection;
>>>>>>> laraxot/dev

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

<<<<<<< HEAD
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

>>>>>>> laraxot/dev
class AssignTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $name = 'user:assign-tenant';

    /**
     * The console command description.
     */
    protected $description = 'Assign a tenant to user';

    /**
     * Create a new command instance.
     */

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
<<<<<<< HEAD
        $xot = XotData::make();
        /** @var UserContract */
        $user = $xot->getUserByEmail($email);
        $tenantClass = $xot->getTenantClass();

        // `pluck('name', 'id')` restituisce anche i tenant con `name` NULL: Laravel
        // Prompts calcola la larghezza della lista con `longest()` e su una label null
        // solleva TypeError, rendendo il comando inutilizzabile per colpa di una sola
        // riga incompleta. Il fallback tiene ogni tenant selezionabile invece di
        // scartarlo: uno senza nome resta comunque assegnabile, identificato dall'id.
        $opts = $tenantClass::all()
            ->mapWithKeys(static function (Model $tenant): array {
                $key = $tenant->getKey();
                $id = \is_scalar($key) ? (string) $key : '';
                $name = $tenant->getAttribute('name');
                $label = \is_string($name) && $name !== '' ? $name : '#'.$id;

                return [$id => $label];
            })
            ->all();

        // Con zero tenant `longest()` va comunque in TypeError: la lista vuota non
        // ha nulla da misurare. E' il caso reale su un database appena replicato.
        if ($opts === []) {
            $this->error('Nessun tenant presente in '.$tenantClass.'. Crearne almeno uno prima di assegnarlo.');

            return;
        }
=======
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);
        $xot = XotData::make();
        $tenantClass = $xot->getTenantClass();

        /** @var array<int|string, string>|Collection<int|string, string> */
        $opts = $tenantClass::all()->pluck('name', 'id')->toArray();
>>>>>>> laraxot/dev

        $rows = multiselect(
            label: 'What tenant',
            options: $opts,
            required: true,
            scroll: 10,
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
        );

        $user->tenants()->sync($rows);
        /*
         * foreach ($rows as $row) {
         * $role = Role::firstOrCreate(['name' => $row]);
         * $user->assignRole($role);
         * }
         */
        $this->info(implode(', ', $rows).' assigned to '.$email);
    }

    /*
     * Get the console command options.
     */
    // protected function getOptions(): array
    // {
    //   return [
    //     ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
    //    ];
    // }
}
