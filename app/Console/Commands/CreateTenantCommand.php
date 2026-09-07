<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;

=======
=======
>>>>>>> f589f9b2 (.)

use function Laravel\Prompts\text;

use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class CreateTenantCommand extends Command
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
    protected $signature = 'user:tenant-create';

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
<<<<<<< HEAD
        // default: $user->name,
        // hint: 'This will be displayed on your profile.'
=======
            // default: $user->name,
            // hint: 'This will be displayed on your profile.'
>>>>>>> 2024e2e7 (.)
=======
            // default: $user->name,
            // hint: 'This will be displayed on your profile.'
>>>>>>> f589f9b2 (.)
        );

        $modelClass::create([
            'name' => $name,
        ]);

<<<<<<< HEAD
<<<<<<< HEAD
        $map = static fn(Model $row) => $row->toArray();
=======
        $map = static fn (Model $row) => $row->toArray();
>>>>>>> 2024e2e7 (.)
=======
        $map = static fn (Model $row) => $row->toArray();
>>>>>>> f589f9b2 (.)

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
<<<<<<< HEAD
            $this->warn('⚡ No Tenants [' . $modelClass . ']');
=======
            $this->warn('⚡ No Tenants ['.$modelClass.']');
>>>>>>> 2024e2e7 (.)
=======
            $this->warn('⚡ No Tenants ['.$modelClass.']');
>>>>>>> f589f9b2 (.)
            $this->newLine();
        }
    }
}
