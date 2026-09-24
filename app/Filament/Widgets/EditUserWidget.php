<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
use Filament\Support\Components\Component;
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 350420cb (Check & fix styling)
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 *
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
 *
<<<<<<< HEAD
 * @property string $type
 * @property string $resource
 * @property string $model
 * @property string $action
 * @property Model $record
 */
class EditUserWidget extends XotBaseSchemaWidget
{
    public string $type = '';

    /** @var class-string */
    public string $resource;

    /** @var class-string<Model> */
    public string $model = Model::class;

    public string $action = '';
=======
 * @property string                    $type
 * @property string                    $resource
 * @property string                    $model
 * @property string                    $action
 * @property Model                     $record
 * @property array<string, mixed>|null $data
 */
class EditUserWidget extends XotBaseWidget
{
    public string $type;

    public string $resource;

    public string $model;

    public string $action;
>>>>>>> 350420cb (Check & fix styling)

    public Model $record;

    /**
<<<<<<< HEAD
     * Initialize the widget with user type and optional user ID.
     */
    public function mount(string $type = '', ?string $userId = null): void
    {
        parent::mount();
        $this->type = $type;
        $resourceClass = XotData::make()->getUserResourceClassByType($type);
        Assert::classExists($resourceClass);
        $this->resource = $resourceClass;

        /** @var class-string<Model> $modelClass */
        $modelClass = $resourceClass::getModel();
        Assert::subclassOf($modelClass, Model::class);
=======
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.edit-user';

    /**
     * Initialize the widget with user type and optional user ID.
     */
    public function mount(string $type, ?string $userId = null): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $modelClass = $this->resource::getModel();
        Assert::string($modelClass, 'Resource getModel() must return string');
>>>>>>> 350420cb (Check & fix styling)
        $this->model = $modelClass;

        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\UpdateUserAction')
            ->toString();

        $record = $this->getFormModel($userId);
<<<<<<< HEAD
        $this->record = $record;
=======
>>>>>>> 350420cb (Check & fix styling)
        $data = $this->getFormFill();

        $this->form->fill($data);
        $this->form->model($record);
        $this->data = $data;
<<<<<<< HEAD
=======
        $this->record = $record;
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        $model = $this->record;
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                /** @var array<string, mixed> $result */
                $result = $model->toArray();

                return $result;
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: ".$e->getMessage());

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
<<<<<<< HEAD
        /** @var array<int, string> $fields */
        $fields = array_merge($fillable, $appends);
=======
        $fields = array_values(array_merge($fillable, $appends));
        Assert::allString($fields);
>>>>>>> 350420cb (Check & fix styling)

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
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema, 'Schema must be array');

<<<<<<< HEAD
        /* @var array<int|string, Component> $result */
        return self::normalizeFormSchema($schema);
=======
        /** @var array<int|string, Component> $result */
        $result = $schema;

        return $result;
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Gestisce il salvataggio delle modifiche delegando all'action specifica.
     *
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
    public function updateUser(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        $record = $this->record;
<<<<<<< HEAD
        $actionInstance = app($this->action);
        if (! is_object($actionInstance) || ! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException(sprintf('Update action [%s] must expose execute().', $this->action));
        }

        \call_user_func([$actionInstance, 'execute'], $record, $data);
=======

        /** @var object{execute: callable} $actionInstance */
        $actionInstance = app($this->action);

        /* @phpstan-ignore method.notFound */
        $actionInstance->execute($record, $data);
>>>>>>> 350420cb (Check & fix styling)

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
                        && ($this->record->id ?? null) !== null
                        && $currentUser->id === $this->record->id
                    || ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null));
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
    protected function getFormModel(?string $userId = null): Model
    {
        if ($userId) {
            $user = $this->model::findOrFail($userId);
            Assert::isInstanceOf($user, Model::class);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && \is_string($this->model) && $currentUser instanceof $this->model) {
            Assert::isInstanceOf($currentUser, Model::class);

            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser && \is_string($this->model)) {
            $query = $this->model::where('user_id', $currentUser->id);

            if (\is_object($query) && method_exists($query, 'first')) {
                $user = $query->first();

                if ($user instanceof Model) {
                    return $user;
                }
            }
        }

        // Ultimo fallback: nuovo modello
        $user = app($this->model);
        Assert::isInstanceOf($user, Model::class);

        return $user;
    }
<<<<<<< HEAD

    /**
     * @param  array<int|string, mixed>  $schema
     * @return array<int|string, Component>
     */
    private static function normalizeFormSchema(array $schema): array
    {
        $normalized = [];
        foreach ($schema as $key => $component) {
            if (! $component instanceof Component) {
                return [];
            }

            $normalized[$key] = $component;
        }

        return $normalized;
    }
=======
>>>>>>> 350420cb (Check & fix styling)
}
