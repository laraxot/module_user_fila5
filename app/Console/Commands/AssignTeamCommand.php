<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Console\Command;
=======
=======
>>>>>>> 87273113 (.)
use Modules\Xot\Contracts\UserContract;
use Illuminate\Support\Collection;
use Illuminate\Console\Command;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Console\Command;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Illuminate\Console\Command;
>>>>>>> laraxot/dev

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Modules\User\Models\BaseUser;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class AssignTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
=======
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     */
    protected $name = 'user:assign-team';

    /**
     * The console command description.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
=======
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     */
    protected $description = 'Assign a team to user';

    /**
     * Create a new command instance.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     */
=======
=======
>>>>>>> 87273113 (.)
     *
     * @return void
     */
    
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
     */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
     */
>>>>>>> laraxot/dev

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $xot = XotData::make();
        $email = text('email ?');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        $user = XotData::make()->getUserByEmail($email);
        Assert::isInstanceOf($user, BaseUser::class);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string> $opts */
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        $user_class = $xot->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string>|Collection<int|string, string> */
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        $user = XotData::make()->getUserByEmail($email);
        Assert::isInstanceOf($user, BaseUser::class);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string> $opts */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        $opts = $teamClass::pluck('name', 'id')->toArray();

        $rows = multiselect(
            label: 'What teams',
            options: $opts,
            required: true,
            scroll: 10,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
        );

        $user->membershipTeams()->sync($rows);
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        // validate: function (array $values) {
        //  return ! \in_array(\count($values), [1, 2], false)
        //    ? 'A maximum of two'
        //  : null;
        // }
        );

        $user->teams()->sync($rows);
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
        );

        $user->membershipTeams()->sync($rows);
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        /*
         * foreach ($rows as $row) {
         * $role = Role::firstOrCreate(['name' => $row]);
         * $user->assignRole($role);
         * }
         */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->info('Teams :'.implode(', ', $rows).' assigned to '.$email);

        $rows = $user->membershipTeams()->get()->toArray();
=======
        $this->info('Teams :' . implode(', ', $rows) . ' assigned to ' . $email);

        $rows = $user->teams()->get()->toArray();
>>>>>>> f548be94 (.)
=======
        $this->info('Teams :' . implode(', ', $rows) . ' assigned to ' . $email);

        $rows = $user->teams()->get()->toArray();
=======
        $this->info('Teams :'.implode(', ', $rows).' assigned to '.$email);

        $rows = $user->membershipTeams()->get()->toArray();
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
        $this->info('Teams :'.implode(', ', $rows).' assigned to '.$email);

        $rows = $user->membershipTeams()->get()->toArray();
>>>>>>> laraxot/dev

        if (\count($rows) > 0) {
            Assert::isArray($rows[0]);
            $headers = array_keys($rows[0]);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            $this->warn('⚡ No teams ['.$teamClass.']');
=======
            $this->warn('⚡ No teams [' . $teamClass . ']');
>>>>>>> f548be94 (.)
=======
            $this->warn('⚡ No teams [' . $teamClass . ']');
=======
            $this->warn('⚡ No teams ['.$teamClass.']');
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
            $this->warn('⚡ No teams ['.$teamClass.']');
>>>>>>> laraxot/dev
            $this->newLine();
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
=======
=======
>>>>>>> 87273113 (.)
    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
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
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
