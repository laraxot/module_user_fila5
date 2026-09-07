<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Illuminate\Support\Collection;
use Illuminate\Console\Command;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;
=======
use Illuminate\Console\Command;
>>>>>>> 2024e2e7 (.)

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

<<<<<<< HEAD
=======
use Modules\User\Models\BaseUser;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

>>>>>>> 2024e2e7 (.)
class AssignTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $name = 'user:assign-team';

    /**
     * The console command description.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $description = 'Assign a team to user';

    /**
     * Create a new command instance.
<<<<<<< HEAD
     *
     * @return void
     */
    
=======
     */
>>>>>>> 2024e2e7 (.)

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $xot = XotData::make();
        $email = text('email ?');
<<<<<<< HEAD
        $user_class = $xot->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string>|Collection<int|string, string> */
=======
        $user = XotData::make()->getUserByEmail($email);
        Assert::isInstanceOf($user, BaseUser::class);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string> $opts */
>>>>>>> 2024e2e7 (.)
        $opts = $teamClass::pluck('name', 'id')->toArray();

        $rows = multiselect(
            label: 'What teams',
            options: $opts,
            required: true,
            scroll: 10,
<<<<<<< HEAD
        // validate: function (array $values) {
        //  return ! \in_array(\count($values), [1, 2], false)
        //    ? 'A maximum of two'
        //  : null;
        // }
        );

        $user->teams()->sync($rows);
=======
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
        );

        $user->membershipTeams()->sync($rows);
>>>>>>> 2024e2e7 (.)
        /*
         * foreach ($rows as $row) {
         * $role = Role::firstOrCreate(['name' => $row]);
         * $user->assignRole($role);
         * }
         */
<<<<<<< HEAD
        $this->info('Teams :' . implode(', ', $rows) . ' assigned to ' . $email);

        $rows = $user->teams()->get()->toArray();
=======
        $this->info('Teams :'.implode(', ', $rows).' assigned to '.$email);

        $rows = $user->membershipTeams()->get()->toArray();
>>>>>>> 2024e2e7 (.)

        if (\count($rows) > 0) {
            Assert::isArray($rows[0]);
            $headers = array_keys($rows[0]);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
<<<<<<< HEAD
            $this->warn('⚡ No teams [' . $teamClass . ']');
=======
            $this->warn('⚡ No teams ['.$teamClass.']');
>>>>>>> 2024e2e7 (.)
            $this->newLine();
        }
    }

<<<<<<< HEAD
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
    /*
     * Get the console command options.
     */
    // protected function getOptions(): array
    // {
    //    return [
    //        ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
    //    ];
    // }
>>>>>>> 2024e2e7 (.)
}
