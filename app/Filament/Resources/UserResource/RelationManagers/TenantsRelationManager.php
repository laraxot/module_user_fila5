<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> 2024e2e7 (.)

/**
 * Manages the relationship between users and tenants.
 *
 * This class provides the form schema and table configuration for the "tenants" relationship
 * with strong typing and enhanced structure for stability and professionalism.
 */
class TenantsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tenants';

<<<<<<< HEAD
    protected static null|string $recordTitleAttribute = 'name';
=======
    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> 2024e2e7 (.)

    /**
     * Set up the form schema for tenant relations.
     *
     * @return array<Component>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }

    /**
     * Define table columns for displaying tenant information.
     *
     * @return array<string, Column>
     */
<<<<<<< HEAD
    #[Override]
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();

        // Ensure we only return Column instances, filter out any Layout\Component instances
        return array_filter($columns, fn($column): bool => $column instanceof Column);
=======
    #[\Override]
    public function getTableColumns(): array
    {
        $listTenants = app(ListTenants::class);

        if (! method_exists($listTenants, 'getTableColumns')) {
            return [];
        }

        $columns = $listTenants->getTableColumns();

        /** @var array<string, Column> $columnMap */
        $columnMap = [];
        foreach ($columns as $column) {
            if (! $column instanceof Column) {
                continue;
            }

            $columnMap[(string) $column->getName()] = $column;
        }

        return $columnMap;
>>>>>>> 2024e2e7 (.)
    }
}
