<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Services\TenantService;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Components\Section;
=======
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Actions\Config\SaveTenantConfigAction;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Pages\XotBasePage;
>>>>>>> 2024e2e7 (.)

/**
 * Pagina per la gestione delle impostazioni delle password.
 *
 * @property Schema $form
 */
<<<<<<< HEAD
class Password extends Page implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

=======
class Password extends XotBasePage
{
>>>>>>> 2024e2e7 (.)
    /**
     * Dati del form per la gestione delle password.
     *
     * @var array<string, mixed>|null
     */
<<<<<<< HEAD
    public null|array $formData = [];

    /**
     * Icona per la navigazione.
     *
     * @var string|null
     */
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    /**
     * Vista per la pagina.
     *
     * @var string
=======
    public ?array $formData = [];

    /**
     * Vista per la pagina.
>>>>>>> 2024e2e7 (.)
     */
    protected string $view = 'user::filament.pages.password';

    /**
<<<<<<< HEAD
     * Ordinamento nella navigazione.
     *
     * @var int|null
     */
    protected static null|int $navigationSort = 1;

    /**
=======
>>>>>>> 2024e2e7 (.)
     * Inizializza la pagina.
     */
    public function mount(): void
    {
        $this->fillForms();
    }

    /**
<<<<<<< HEAD
     * Definisce la struttura del form.
     *
     * @param Schema $schema Il form da configurare
     * @return Schema Il form configurato
     */
    public function form(Schema $schema): Schema
=======
     * Definisce la struttura dello schema.
     *
     * @param  Schema  $schema  Lo schema da configurare
     * @return Schema Lo schema configurato
     */
    public function schema(Schema $schema): Schema
>>>>>>> 2024e2e7 (.)
    {
        return $schema
            ->components([
                TextInput::make('otp_expiration_minutes')
                    // Durata in minuti della validità della password temporanea
                    ->numeric()
                    ->helperText(static::trans('fields.otp_expiration_minutes.help'))
                    ->default(60),
                TextInput::make('otp_length')
                    // Lunghezza del codice OTP
                    ->helperText(static::trans('fields.otp_length.help'))
                    ->numeric(),
                TextInput::make('expires_in')->helperText(static::trans('fields.expires_in.help'))->numeric(), // The number of days before the password expires.
                TextInput::make('min')->helperText(static::trans('fields.min.help'))->numeric(), // = 6; // The minimum size of the password.
                Toggle::make('mixedCase')->helperText(static::trans('fields.mixedCase.help')), // = false; // If the password requires at least one uppercase and one lowercase letter.
                Toggle::make('letters')->helperText(static::trans('fields.letters.help')), // = false; // If the password requires at least one letter.
                Toggle::make('numbers')->helperText(static::trans('fields.numbers.help')), // = false; // If the password requires at least one number.
                Toggle::make('symbols')->helperText(static::trans('fields.symbols.help')), // = false; // If the password requires at least one symbol.
                Toggle::make('uncompromised')->helperText(static::trans('fields.uncompromised.help')), // = false; // If the password should not have been compromised in data leaks.
                TextInput::make('compromisedThreshold')
                    ->helperText(static::trans('fields.compromisedThreshold.help'))
                    ->numeric(), // = 1; // The number of times a password can appear in data leaks before being considered compromised.
            ])
            ->columns(3)
            // ->model($this->getUser())
            ->statePath('formData');
    }

    /**
     * Aggiorna i dati delle impostazioni delle password.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
     */
    public function updateData(): void
    {
        try {
            /** @var array<string, mixed> $data */
            $data = $this->form->getState();
<<<<<<< HEAD
            TenantService::saveConfig('password', $data);
=======
            app(SaveTenantConfigAction::class)->execute('password', $data);
>>>>>>> 2024e2e7 (.)

            // $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            dddx($exception->getMessage());

            return;
        }
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    /**
     * Riempie i form con i dati esistenti.
<<<<<<< HEAD
     *
     * @return void
     */
    protected function fillForms(): void
    {
=======
     */
    protected function fillForms(): void
    {
        /** @var array<string, mixed> $data */
>>>>>>> 2024e2e7 (.)
        $data = PasswordData::make()->toArray();

        $this->form->fill($data);
    }

    /**
     * Restituisce le azioni per il form di aggiornamento.
     *
     * @return array<Action>
     */
    protected function getUpdateFormActions(): array
    {
        return [
            Action::make('updateDataAction')->submit('editDataForm'),
        ];
    }

    /**
     * Gestisce l'aggiornamento del record.
     *
<<<<<<< HEAD
     * @param Model $record Il record da aggiornare
     * @param array<string, mixed> $data I dati per l'aggiornamento
=======
     * @param  Model  $record  Il record da aggiornare
     * @param  array<string, mixed>  $data  I dati per l'aggiornamento
>>>>>>> 2024e2e7 (.)
     * @return Model Il record aggiornato
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
