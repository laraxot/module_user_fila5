<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Support\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 *
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
 *
 * @property string     $type
 * @property string     $resource
 * @property string     $model
 * @property string     $action
 * @property Model      $record
 * @property array|null $data
 */
class EditUserWidget extends XotBaseWidget
{
    public string $type;

    public string $resource;

    public string $model;

    public string $action;

    public Model $record;

    /** @var array<string, mixed>|null */
    public ?array $data = null;

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.edit-user';

    /**
     * Initialize the widget with user type and optional user ID.
     */
    public function mount(string $type, ?string $userId = null): void
    {
        // @var mixed type = $type;
        // @var mixed resource = XotData::make(;
        $modelClass = // @var mixed resource::getModel(;
        Assert::string($modelClass, 'Resource getModel() must return string');
        // @var mixed model = $modelClass;

        // @var mixed action = Str::of($this->model
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\UpdateUserAction')
            ->toString();

        $record = // @var mixed getFormModel($userId;
        $data = // @var mixed getFormFill(;

        // @var mixed form->fill($data;
        // @var mixed form->model($record;
        // @var mixed data = $data;
        // @var mixed record = $record;
    }

    /**
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        $model = // @var mixed record;
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                /** @var array<string, mixed> $result */
                $result = $model->toArray();

                return $result;
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {// @var mixed model}: ".$e->getMessage(;

                /** @var array<string, mixed> $result */
                $result = $model->getAttributes();
                // Gestisci specificamente gli enum se presenti
                if (isset($result['type']) && ($model->type ?? null) instanceof \BackedEnum) {
                    $result['type'] = $model->type->value;
                }

                return $result;
            }
        }
        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);

        /** @var array<string, mixed> $result */
        $result = array_fill_keys($fields, null);

        return $result;
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
     * @return array<int|string, Component>
     */
    public function getFormSchema(): array
    {
        $schema = // @var mixed resource::getFormSchemaWidget(;
        Assert::isArray($schema, 'Schema must be array');

        /** @var array<int|string, Component> $result */
        $result = $schema;

        return $result;
    }

    /**
     * Gestisce il salvataggio delle modifiche delegando all'action specifica.
     *
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
    public function updateUser(): RedirectResponse|Redirector
    {
        $data = // @var mixed form->getState(;
        $record = // @var mixed record;

        return redirect()->back();
    }

    /**
     * Controlla se l'utente può modificare il record corrente.
     */
    public function canEdit(): bool
    {
        $currentUser = Auth::user();

        return $currentUser
            && (($currentUser->id ?? null) !== null
                        && (// @var mixed record->id ?? null
                        && $currentUser->id === // @var mixed record->id
                    || ($currentUser->id ?? null) !== null && $currentUser->id === (// @var mixed record->user_id ?? null;
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
    protected function getFormModel(?string $userId = null): Model
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = // @var mixed model;
        if ($userId) {
            $user = // @var mixed model::findOrFail($userId;
            Assert::isInstanceOf($user, Model::class);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && \is_string(// @var mixed model
            Assert::isInstanceOf($currentUser, Model::class);

            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser && \is_string(// @var mixed model
            $query = // @var mixed model::where('user_id', $currentUser->id;

            if (\is_object($query) && method_exists($query, 'first')) {
                $user = $query->first();

                if ($user instanceof Model) {
                    return $user;
                }
            }
        }

        // Ultimo fallback: nuovo modello
        $user = app(// @var mixed model;
        Assert::isInstanceOf($user, Model::class);

        return $user;
    }
}
