<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Actions\Cast\SafeArrayCastAction;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseSchemaWidget
{
    public string $type = '';

    /** @var class-string */
    public string $resource;

    /** @var class-string<Model> */
    public string $model = Model::class;

    public string $action = '';
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * Registration widget for Filament admin panel.
 * Handles user registration workflows with dynamic model configuration.
 *
 * @property string $type     The registration type identifier
 * @property string $resource The resource class name for the user model
 * @property string $model    The model class name
 * @property string $action   The action class to execute registration
 */
class RegistrationWidget extends XotBaseWidget
{
    /** @var array<string, mixed>|null */
    public ?array $data = [];

    public string $type;

    public string $resource;

    public string $model;

    public string $action;
>>>>>>> 350420cb (Check & fix styling)

    public Model $record;

    protected int|string|array $columnSpan = 'full';

<<<<<<< HEAD
    public function mount(string $type = ''): void
    {
        parent::mount();
        $this->type = $type;
        $resourceClass = XotData::make()->getUserResourceClassByType($type);
        Assert::classExists($resourceClass);
        $this->resource = $resourceClass;

        /** @var class-string<Model> $modelClass */
        $modelClass = $resourceClass::getModel();
        Assert::subclassOf($modelClass, Model::class);
        $this->model = $modelClass;
=======
    /**
     * @phpstan-var class-string
     *
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);

        $modelClass = $this->resource::getModel();
        $this->model = \is_string($modelClass) ? $modelClass : '';
>>>>>>> 350420cb (Check & fix styling)

        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();

        $this->data = $data;
        $this->form->fill($this->data);
        $this->form->model($record);
        $this->record = $record;
    }

    public function getFormModel(): Model
    {
<<<<<<< HEAD
=======
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;

>>>>>>> 350420cb (Check & fix styling)
        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

<<<<<<< HEAD
        $user = is_string($email)
            ? $this->model::firstWhere('email', $email)
            : null;
        if (! $user instanceof Model) {
            $model = app($this->model);
            Assert::isInstanceOf($model, Model::class);
=======
        /** @var Model|null $user */
        $user = $this->model::firstWhere('email', $email);
        if (null === $user) {
            /** @var Model $model */
            $model = app($this->model);
>>>>>>> 350420cb (Check & fix styling)

            return $model;
        }

        $rememberToken = $user->getAttribute('remember_token');
<<<<<<< HEAD
        if (is_string($token) && '' !== $token) {
            $user->setAttribute('remember_token', $token);
            $user->save();
=======
        if ($token) {
            $user->setAttribute('remember_token', $token);
            $user->save();
            $rememberToken = $user->getAttribute('remember_token');
        }

        if ($rememberToken === $token) {
>>>>>>> 350420cb (Check & fix styling)
            $this->record = $user;

            return $user;
        }

<<<<<<< HEAD
        if (is_string($rememberToken) && $rememberToken === $token) {
            $this->record = $user;

            return $user;
        }

        $model = app($this->model);
=======
        $model = app($modelClass);
>>>>>>> 350420cb (Check & fix styling)
        Assert::isInstanceOf($model, Model::class);

        return $model;
    }

    /**
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    // @override
=======
    #[\Override]
>>>>>>> 350420cb (Check & fix styling)
    public function getFormFill(): array
    {
        /** @var array<string, mixed> $data */
        $data = SafeArrayCastAction::cast(parent::getFormFill());
        $data['type'] = $this->type;

        return $data;
    }

    /**
     * @return array<int|string, Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
    {
        $schema = $this->resource::getFormSchemaWidget();

        return \is_array($schema)
            ? self::normalizeFormSchema($schema)
            : [];
=======
    #[\Override]
    public function getFormSchema(): array
    {
        /** @var array<int|string, Component> $schema */
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);

        return $schema;
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
<<<<<<< HEAD
    // @override
    public function register(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        /** @var array<string, mixed> $initialData */
        $initialData = $this->data ?? [];
        $data = array_merge($initialData, $data);
        $record = $this->record;

        $actionInstance = app($this->action);
        if (! \is_object($actionInstance) || ! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException(\sprintf('Registration action [%s] must expose an execute method.', $this->action));
        }
        \call_user_func([$actionInstance, 'execute'], $record, $data);
=======
    public function register(): RedirectResponse|Redirector
    {
        $lang = app()->getLocale();

        $data = $this->form->getState();
        /** @var array<string, mixed> $data */
        $data = array_merge($this->data ?? [], $data);
        $record = $this->record;

        /** @var object{execute: callable} $actionInstance */
        $actionInstance = app($this->action);

        /* @phpstan-ignore method.notFound */
        $actionInstance->execute($record, $data);
>>>>>>> 350420cb (Check & fix styling)

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type.'_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        // return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
<<<<<<< HEAD

    /**
     * @param array<int|string, mixed> $schema
     *
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
