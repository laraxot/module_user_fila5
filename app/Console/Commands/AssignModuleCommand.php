<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Contracts\RepositoryInterface;

class AssignModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:assign-module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign or revoke modules to/from user';

    public function __construct(
        private readonly RepositoryInterface $moduleRepository,
        private readonly Role $roleModel,
    ) {
        parent::__construct();
    }

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

        if (! $user) {
            // @var mixed error("User with email '{$email}' not found.";

            return;
        }

        // Get all available modules
        /** @var array<string, mixed> $allModules */
        $allModules = // @var mixed moduleRepository->all(;

        // Ensure $allModules is an array for PHPStan
        if (! is_array($allModules)) {
            // @var mixed error('Unable to retrieve modules.';

            return;
        }

        $moduleKeys = array_map('strval', array_keys($allModules));
        /** @var array<int|string, string> $moduleOptions */
        $moduleOptions = array_combine($moduleKeys, $moduleKeys);

        // Get user's current module roles
        // $userModuleRoles = // @var mixed getUserModuleRoles($user;
        $userModuleRoles = $user->getModules();
        $currentModules = is_array($userModuleRoles) ? array_keys($userModuleRoles) : [];

        // Show current modules as default selected
        // @var mixed info('Current modules for '.$email.': '.implode(', ', $currentModules;

        $selectedModules = multiselect(
            label: 'Select modules (checked = assigned, unchecked = will be revoked)',
            options: $moduleOptions,
            default: $currentModules, // Show current modules as checked
            required: false, // Allow empty selection
            scroll: 10,
        );

        // Determine modules to assign and revoke
        $modulesToAssign = array_diff($selectedModules, $currentModules);
        $modulesToRevoke = array_diff($currentModules, $selectedModules);

        // Assign new modules
        foreach ($modulesToAssign as $module) {
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Create or get the role with the web guard
            $role = // @var mixed roleModel->firstOrCreate(['name' => $roleName], [];

            // Assign the role to the user
            $user->assignRole($role);

            // @var mixed info("✓ Assigned module: {$module}";
        }

        // Revoke unchecked modules
        foreach ($modulesToRevoke as $module) {
            $moduleLower = strtolower(is_string($module) ? $module : ((string) $module));
            $roleName = $moduleLower.'::admin';

            // Revoke the role from the user
            $user->removeRole($roleName);

            // @var mixed warn("✗ Revoked module: {$module}";
        }

        // Summary
        if (empty($modulesToAssign) && empty($modulesToRevoke)) {
            // @var mixed info('No changes made to user modules.';

            return;
        }
        // @var mixed info("Module assignment updated for {$email}";
    }
}
