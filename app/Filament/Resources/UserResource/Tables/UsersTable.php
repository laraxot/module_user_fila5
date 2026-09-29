<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\UserResource\Actions\VerifyEmailAction;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class UsersTable extends BaseUsersTable
{
    /**
     * @var class-string<User>
     */
    protected static string $model = User::class;


}
