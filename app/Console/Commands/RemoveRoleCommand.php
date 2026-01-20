<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
>>>>>>> f548be94 (.)

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

<<<<<<< HEAD
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

=======
>>>>>>> f548be94 (.)
class RemoveRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
     */
    protected $name = 'user:remove-role';

    /**
     * The console command description.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
     */
    protected $description = 'remove a role to user';

    /**
     * Create a new command instance.
<<<<<<< HEAD
     */
=======
     *
     * @return void
     */
    
>>>>>>> f548be94 (.)

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
        /**
         * @var UserContract $user
         */
        $user = XotData::make()->getUserByEmail($email);
<<<<<<< HEAD
        /** @var Collection<int, Role> $roles */
        $roles = $user->roles()->get();
        /** @var array<string, string> $opts */
        $opts = $roles->pluck('name', 'name')->toArray();
=======
        /**
         * @var array<string, string>
         */
        $opts = $user->roles->pluck('name', 'name')->toArray();
>>>>>>> f548be94 (.)

        $rows = multiselect(
            label: 'What roles',
            options: $opts,
            required: true,
            scroll: 10,
<<<<<<< HEAD
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
=======
        // validate: function (array $values) {
        //  return ! \in_array(\count($values), [1, 2], false)
        //    ? 'A maximum of two'
        //  : null;
        // }
>>>>>>> f548be94 (.)
        );

        foreach ($rows as $row) {
            // $role = Role::firstOrCreate(['name' => $row]);
            // $user->assignRole($role);
            $user->removeRole($row);
        }

<<<<<<< HEAD
        $this->info(implode(', ', $rows).' dessigned to '.$email);
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
=======
        $this->info(implode(', ', $rows) . ' dessigned to ' . $email);
    }

    /**
     * Get the console command arguments.
     */
    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
>>>>>>> f548be94 (.)
}
