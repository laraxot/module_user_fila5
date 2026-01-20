<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

<<<<<<< HEAD
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> f548be94 (.)
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> f548be94 (.)

class CreateProfile extends XotBaseCreateRecord
{
    protected static string $resource = BaseProfileResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
<<<<<<< HEAD
        $userData = Arr::except($data, ['user']);
        $extra = $data['user'] ?? [];
        if (! is_array($extra)) {
            $extra = [];
        }
        $userData = array_merge($userData, $extra);
        $userClass = XotData::make()->getUserClass();
        /** @var array<string, mixed> $userData */
        $user = $userClass::create($userData);
=======
        $user_data = Arr::except($data, ['user']);
        $extra = $data['user'] ?? [];
        if (!is_array($extra)) {
            $extra = [];
        }
        $user_data = array_merge($user_data, $extra);
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = $user_class::create($user_data);
>>>>>>> f548be94 (.)
        $data['user_id'] = $user->getKey();

        return $data;
    }
}
