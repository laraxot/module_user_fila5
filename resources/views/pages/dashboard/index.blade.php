<?php

declare(strict_types=1);

use Livewire\Volt\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

name('dashboard');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $userName = '';

    public function mount(): void
    {
        if (! auth()->check()) {
            $this->redirect(LaravelLocalization::localizeURL('/auth/login'));

            return;
        }

        $this->userName = (string) auth()->user()?->name;
    }
};
?>

<x-layouts.app>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    @volt('dashboard')
        <main id="main-container" class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <header class="cmp-heading mb-4">
                        <h1 class="title-xxxlarge">{{ __('Benvenuto, :name', ['name' => $userName]) }}</h1>
                        <p class="subtitle-small mb-0">
                            {{ __('Da qui puoi seguire lo stato delle tue segnalazioni e pratiche.') }}
                        </p>
                    </header>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h2 class="title-medium mb-2">{{ __('Le mie pratiche') }}</h2>
                            <p class="text-muted mb-3">
                                {{ __('Consulta lo stato di avanzamento delle tue segnalazioni e richieste.') }}
                            </p>
                            <a href="{{ LaravelLocalization::localizeURL('/area-personale/pratiche') }}" class="btn btn-primary">
                                {{ __('Vai alle mie pratiche') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endvolt
</x-layouts.app>
