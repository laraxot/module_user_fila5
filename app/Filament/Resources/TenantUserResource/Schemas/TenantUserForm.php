<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Component as SchemaComponent;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class TenantUserForm extends XotBaseResourceForm
{
    /**
     * Records with a NULL name would make Filament pass null where a string label
     * is required, so fall back to the primary key.
     */
    private static function recordLabel(Model $record): string
    {
        $name = app(SafeStringCastAction::class)->execute($record->getAttribute('name'));

        if ('' !== $name) {
            return $name;
        }

        $key = app(SafeStringCastAction::class)->execute($record->getKey());
        if ('' !== $key) {
            return '#'.$key;
        }

        return '#'.$record::class.'@'.spl_object_id($record);
    }

    /**
     * @return array<int|string, SchemaComponent>
     */
    public static function getFormSchema(): array
    {
        return [
            'tenant_user' => Section::make('Tenant User Information')
                ->schema([
                    'tenant' => Select::make('tenant')
                        ->label('Tenant')
                        ->relationship('tenant', 'name')
                        ->getOptionLabelFromRecordUsing(
                            static fn (Model $record): string => self::recordLabel($record)
                        )
                        ->required()
                        ->searchable(),
                    'user' => Select::make('user')
                        ->label('User')
                        ->relationship('user', 'name')
                        ->getOptionLabelFromRecordUsing(
                            static fn (Model $record): string => self::recordLabel($record)
                        )
                        ->required()
                        ->searchable(),
                ])
                ->columns(2),
        ];
    }
}
