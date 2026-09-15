<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\Device;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\Device;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class DevicesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<Device>
     */
    protected static string $model = Device::class;

    /**
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'user_id' => TextColumn::make('user_id'),
            'device' => TextColumn::make('device'),
            'platform' => TextColumn::make('platform'),
            'browser' => TextColumn::make('browser'),
            'ip' => TextColumn::make('ip'),
            'is_desktop' => TextColumn::make('is_desktop')->badge(),
            'is_mobile' => TextColumn::make('is_mobile')->badge(),
            'is_phone' => TextColumn::make('is_phone')->badge(),
            'is_robot' => TextColumn::make('is_robot')->badge(),
            'is_tablet' => TextColumn::make('is_tablet')->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
=======
>>>>>>> laraxot/dev
            'device' => TextColumn::make('device')->searchable()->sortable(),
            'platform' => TextColumn::make('platform')->searchable()->sortable(),
            'browser' => TextColumn::make('browser')->searchable()->sortable(),
            'is_desktop' => IconColumn::make('is_desktop')->boolean()->sortable(),
            'is_mobile' => IconColumn::make('is_mobile')->boolean()->sortable(),
            'is_phone' => IconColumn::make('is_phone')->boolean()->sortable(),
            'is_tablet' => IconColumn::make('is_tablet')->boolean()->sortable(),
            'is_robot' => IconColumn::make('is_robot')->boolean()->sortable(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'uuid' => TextColumn::make('uuid')->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
