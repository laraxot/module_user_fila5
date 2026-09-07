<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;

=======

use function Laravel\Prompts\text;

use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

>>>>>>> 2024e2e7 (.)
class CreateTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $signature = 'user:team-create';

    /**
     * The console command description.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $description = 'Create a team';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $modelClass = XotData::make()->getTeamClass();

        $name = text(
            label: 'What is name of team?',
            placeholder: 'E.g. Moderator, ',
<<<<<<< HEAD
        // default: $user->name,
        // hint: 'This will be displayed on your profile.'
=======
            // default: $user->name,
            // hint: 'This will be displayed on your profile.'
>>>>>>> 2024e2e7 (.)
        );

        $modelClass::create([
            'name' => $name,
        ]);

<<<<<<< HEAD
        $map = static fn(Model $row) => $row->toArray();
=======
        $map = static fn (Model $row) => $row->toArray();
>>>>>>> 2024e2e7 (.)

        $rows = $modelClass::get()->map($map);

        if (\count($rows) > 0) {
            $first = $rows[0];
            Assert::isArray($first);
            $headers = array_keys($first);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
<<<<<<< HEAD
            $this->warn('⚡ No Teams [' . $modelClass . ']');
=======
            $this->warn('⚡ No Teams ['.$modelClass.']');
>>>>>>> 2024e2e7 (.)
            $this->newLine();
        }
    }
}
