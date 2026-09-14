<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseUserResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;

class BaseUserForm extends XotBaseResourceForm
{
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'section01' => Section::make([
                'name' => TextInput::make('name')->required(),
                'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
                'password' => TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(function ($state) {
                        if (empty($state)) {
                            return;
                        }

                        return is_string($state) ? Hash::make($state) : null;
                    })
                    ->required(fn ($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => TextEntry::make('created_at')->state(static function ($record) {
                    if ($record === null || ! $record instanceof Model) {
                        return new HtmlString('&mdash;');
                    }

                    if (! isset($record->created_at) || ! ($record->created_at instanceof \DateTimeInterface)) {
                        return new HtmlString('&mdash;');
                    }

                    $createdAt = $record->created_at;

                    return $createdAt instanceof CarbonInterface ? $createdAt->diffForHumans() : $createdAt->format('Y-m-d H:i:s');
                }),
            ])->columnSpan(4),
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class BaseUserForm extends XotBaseResourceForm
{
    /**
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required(),
            'first_name' => TextInput::make('first_name'),
            'last_name' => TextInput::make('last_name'),
            'email' => TextInput::make('email')->email()->required(),
            'password' => TextInput::make('password')->password(),
            'lang' => TextInput::make('lang'),
            'current_team_id' => TextInput::make('current_team_id'),
            'is_active' => Toggle::make('is_active'),
            'is_otp' => Toggle::make('is_otp'),
            'password_expires_at' => DatePicker::make('password_expires_at'),
            'email_verified_at' => DatePicker::make('email_verified_at'),
            'type' => TextInput::make('type'),
            'state' => TextInput::make('state'),
>>>>>>> laraxot/dev
        ];
    }
}
