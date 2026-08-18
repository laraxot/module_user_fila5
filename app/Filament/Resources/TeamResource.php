<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< .merge_file_nLfqJq
use Filament\Forms\Components\Field;
=======

>>>>>>> .merge_file_JAKC4M
class TeamResource extends XotBaseResource
{
    /**
     * Get the model class name for this resource.
     *
     * @return class-string<Model>
     */
    #[\Override]
    public static function getModel(): string
    {
        $xot = XotData::make();

        /* @var class-string<Model> */
        return $xot->getTeamClass();
    }

<<<<<<< .merge_file_nLfqJq
    //#[\Override]
=======
    // #[\Override]
>>>>>>> .merge_file_JAKC4M
    /**
     * @return array<string, mixed>
     */
    public static function getFormSchemaOld(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'display_name' => TextInput::make('display_name')->maxLength(255),
            'description' => TextInput::make('description')->maxLength(255),
        ];
    }
}
