<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

use function Laravel\Prompts\text;

use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

=======
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;

>>>>>>> f548be94 (.)
class CreateTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
     */
    protected $signature = 'user:tenant-create';

    /**
     * The console command description.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
     */
    protected $description = 'Create a tenant';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $modelClass = XotData::make()->getTenantClass();

        $name = text(
            label: 'What is name of tenant?',
            placeholder: 'E.g. Tabacchi belli',
<<<<<<< HEAD
            // default: $user->name,
            // hint: 'This will be displayed on your profile.'
=======
        // default: $user->name,
        // hint: 'This will be displayed on your profile.'
>>>>>>> f548be94 (.)
        );

        $modelClass::create([
            'name' => $name,
        ]);

<<<<<<< HEAD
        $map = static fn (Model $row) => $row->toArray();
=======
        $map = static fn(Model $row) => $row->toArray();
>>>>>>> f548be94 (.)

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
            $this->warn('⚡ No Tenants ['.$modelClass.']');
=======
            $this->warn('⚡ No Tenants [' . $modelClass . ']');
>>>>>>> f548be94 (.)
            $this->newLine();
        }
    }
}
