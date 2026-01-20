<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Contracts\RepositoryInterface;
=======
use Illuminate\Support\Str;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;
>>>>>>> f548be94 (.)

class AssignModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> f548be94 (.)
     */
    protected $name = 'user:assign-module';

    /**
     * The console command description.
<<<<<<< HEAD
     */
    protected $description = 'Assign or revoke modules to/from user';

    public function __construct(
        private readonly RepositoryInterface $moduleRepository,
        private readonly Role $roleModel,
    ) {
        parent::__construct();
    }
=======
     *
     * @var string
     */
    protected $description = 'Assign or revoke modules to/from user';

    /**
     * Create a new command instance.
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
        if (! $user) {
            $this->error("User with email '{$email}' not found.");

=======
        if (!$user) {
            $this->error("User with email '{$email}' not found.");
>>>>>>> f548be94 (.)
            return;
        }

        // Get all available modules
<<<<<<< HEAD
        /** @var array<string, mixed> $allModules */
        $allModules = $this->moduleRepository->all();

        // Ensure $allModules is an array for PHPStan
        if (! is_array($allModules)) {
            $this->error('Unable to retrieve modules.');

            return;
        }

        $moduleKeys = array_map('strval', array_keys($allModules));
        /** @var array<int|string, string> $moduleOptions */
        $moduleOptions = array_combine($moduleKeys, $moduleKeys);

        // Get user's current module roles
        // $userModuleRoles = $this->getUserModuleRoles($user);
        $userModuleRoles = $user->getModules();
        $currentModules = is_array($userModuleRoles) ? array_keys($userModuleRoles) : [];

        // Show current modules as default selected
        $this->info('Current modules for '.$email.': '.implode(', ', $currentModules));

        $selectedModules = multiselect(
            label: 'Select modules (checked = assigned, unchecked = will be revoked)',
            options: $moduleOptions,
=======
        $modules_opts = array_keys(Module::all());
        $modules_opts = array_combine($modules_opts, $modules_opts);

        // Get user's current module roles
        $userModuleRoles = $this->getUserModuleRoles($user);
        $currentModules = array_keys($userModuleRoles);

        // Show current modules as default selected
        $this->info("Current modules for {$email}: " . implode(', ', $currentModules));

        $selectedModules = multiselect(
            label: 'Select modules (checked = assigned, unchecked = will be revoked)',
            options: $modules_opts,
>>>>>>> f548be94 (.)
            default: $currentModules, // Show current modules as checked
            required: false, // Allow empty selection
            scroll: 10,
        );

        // Determine modules to assign and revoke
        $modulesToAssign = array_diff($selectedModules, $currentModules);
        $modulesToRevoke = array_diff($currentModules, $selectedModules);

        // Assign new modules
        foreach ($modulesToAssign as $module) {
<<<<<<< HEAD
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Create or get the role with the web guard
            $role = $this->roleModel->firstOrCreate(['name' => $roleName], []);
=======
            $module_low = Str::lower(is_string($module) ? $module : ((string) $module));
            $role_name = $module_low . '::admin';

            // Create or get the role with the web guard
            $role = Role::firstOrCreate(['name' => $role_name], []);
>>>>>>> f548be94 (.)

            // Assign the role to the user
            $user->assignRole($role);

            $this->info("✓ Assigned module: {$module}");
        }

        // Revoke unchecked modules
        foreach ($modulesToRevoke as $module) {
<<<<<<< HEAD
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Revoke the role from the user
            $user->removeRole($roleName);
=======
            $module_low = Str::lower(is_string($module) ? $module : ((string) $module));
            $role_name = $module_low . '::admin';

            // Revoke the role from the user
            $user->removeRole($role_name);
>>>>>>> f548be94 (.)

            $this->warn("✗ Revoked module: {$module}");
        }

        // Summary
        if (empty($modulesToAssign) && empty($modulesToRevoke)) {
            $this->info('No changes made to user modules.');
<<<<<<< HEAD

            return;
        }
        $this->info("Module assignment updated for {$email}");
=======
        } else {
            $this->info("Module assignment updated for {$email}");
        }
    }

    /**
     * Get user's current module roles.
     *
     * @param UserContract $user
     * @return array<string, string>
     */
    private function getUserModuleRoles(UserContract $user): array
    {
        $moduleRoles = [];

        foreach ($user->roles as $role) {
            if (Str::endsWith($role->name, '::admin')) {
                $moduleName = Str::before($role->name, '::admin');
                $moduleRoles[$moduleName] = $role->name;
            }
        }

        return $moduleRoles;
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
>>>>>>> f548be94 (.)
    }
}
