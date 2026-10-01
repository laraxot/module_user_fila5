<?php

declare(strict_types=1);
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

namespace Modules\User\Filament\Actions\Header;

use Filament\Actions\AttachAction;
use Filament\Forms\Components\Select;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Actions\XotBaseAttachAction;

final class AttachRoleAction extends XotBaseAttachAction
{
    protected function setUp(): void
    {
        $xotData = XotData::make();
        parent::setUp();
<<<<<<< HEAD
        $this->icon('heroicon-o-link')
=======
        $this->translateLabel()
            ->tooltip(__('user::user.actions.attach_role'))
            ->icon('heroicon-o-link')
>>>>>>> laraxot/dev
            ->iconButton()
            ->schema(static function (AttachAction $action) use ($xotData): array {
                return [
                    $action->getRecordSelect(),
                    Select::make('team_id')->options($xotData->getTeamClass()::get()->pluck('name', 'id')),
                ];
            });
    }

    public static function getDefaultName(): string
    {
        return 'attachRole';
    }
}
