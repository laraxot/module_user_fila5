<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Filament\Actions\Header;

use Filament\Actions\AttachAction;
use Filament\Forms\Components\Select;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
use Modules\Xot\Filament\Actions\XotBaseAttachAction;

final class AttachRoleAction extends XotBaseAttachAction
=======

final class AttachRoleAction extends AttachAction
>>>>>>> 350420cb (Check & fix styling)
{
    protected function setUp(): void
    {
        $xotData = XotData::make();
        parent::setUp();
        $this->icon('heroicon-o-link')
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
