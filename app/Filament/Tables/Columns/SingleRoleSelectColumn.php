<?php

declare(strict_types=1);

namespace Modules\User\Filament\Tables\Columns;

<<<<<<< HEAD
<<<<<<< .merge_file_uMAK8t
=======
use Modules\User\Filament\Forms\Components\SingleRoleSelect;
>>>>>>> .merge_file_4md8qu
=======
<<<<<<< .merge_file_YmiDWg
=======
<<<<<<< .merge_file_elBi2b
=======
use Modules\User\Filament\Forms\Components\SingleRoleSelect;
>>>>>>> .merge_file_cO27Xo
>>>>>>> .merge_file_FBEn3o
>>>>>>> df2ba808 (.)
use Modules\User\Models\Role;
use Modules\Xot\Filament\Tables\Columns\XotBaseSelectColumn;

/**
<<<<<<< HEAD
<<<<<<< .merge_file_uMAK8t
 * Controparte in lista di {@see \Modules\User\Filament\Forms\Components\SingleRoleSelect}.
=======
 * Controparte in lista di {@see SingleRoleSelect}.
>>>>>>> .merge_file_4md8qu
=======
<<<<<<< .merge_file_YmiDWg
 * Controparte in lista di {@see \Modules\User\Filament\Forms\Components\SingleRoleSelect}.
=======
<<<<<<< .merge_file_elBi2b
 * Controparte in lista di {@see \Modules\User\Filament\Forms\Components\SingleRoleSelect}.
=======
 * Controparte in lista di {@see SingleRoleSelect}.
>>>>>>> .merge_file_cO27Xo
>>>>>>> .merge_file_FBEn3o
>>>>>>> df2ba808 (.)
 *
 * Stesse opzioni (ruoli da `Role::query()`), esposte come select inline di riga.
 *
 * Usage:
 * ```php
 * 'role_id' => SingleRoleSelectColumn::make('role_id'),
 * ```
 *
 * @see Modules/User/docs/form-column-parity.md
 */
class SingleRoleSelectColumn extends XotBaseSelectColumn
{
    protected const string DEFAULT_NAME = 'role_id';

    public static function make(?string $name = null): static
    {
        return parent::make($name ?? static::DEFAULT_NAME);
    }

    /**
     * Opzioni ruolo: SSoT condivisa con SingleRoleSelect.
     *
     * @return array<int|string, string>
     */
    public static function roleOptions(): array
    {
        /** @var array<int|string, string> $options */
        $options = Role::query()->pluck('name', 'id')->toArray();

        return $options;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->options(static fn (): array => static::roleOptions());
    }
}
