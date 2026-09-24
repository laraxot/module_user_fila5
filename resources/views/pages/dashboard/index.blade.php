<?php

declare(strict_types=1);
<<<<<<< HEAD
use Livewire\Volt\Component;

=======

use Livewire\Volt\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;
>>>>>>> 350420cb (Check & fix styling)
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

name('dashboard');
<<<<<<< HEAD
middleware(['auth', 'verified']);

new class extends Component {};
?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @volt('dashboard')
        <div class="flex flex-col flex-1 items-stretch h-100">
            <div class="flex flex-col items-stretch flex-1 pb-5 mx-auto h-100 min-h-[500px] w-full">
                <div class="relative flex-1 w-full h-100">
                    <div class="flex justify-between items-center w-full h-100 bg-pink- overflow-hidden border border-dashed bg-gradient-to-br from-white to-zinc-50 rounded-lg border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 max-h-[500px]">
                        <div class="flex relative flex-col p-10">
                            <div class="flex items-center pb-5 mb-5 space-x-1.5 text-lg font-bold text-gray-800 uppercase border-b border-dotted border-zinc-200 dark:border-gray-800 dark:text-gray-200">
                                <x-ui.logo class="block w-auto h-7 text-gray-800 fill-current dark:text-gray-200" />
                                <span>Genesis</span>
                            </div>
                            <p class="mb-5 text-sm text-zinc-500 dark:text-gray-400">This is the default dashboard which you can use and customize. Alternatively we also have three dashboard starter templates available.</p>
                            <p class="text-sm text-zinc-500 dark:text-gray-400">You can get all three designs, each with dark mode for only $29. Learn more below.</p>
                            <div class="flex items-center my-6 space-x-3">
                                <x-ui.button href="https://tonylea.lemonsqueezy.com/checkout/buy/7b997498-2512-4d24-8aa6-6027c5a22922?logo=0" tag="a" target="_blank" type="primary"><x-phosphor-storefront-duotone class="mr-1 w-4 h-4" /> Get It Here</x-ui.button>
                                <x-ui.button href="https://www.youtube.com/watch?v=bkdXxmeh0Aw" tag="a" target="_blank" type="secondary"><x-phosphor-popcorn-duotone class="mr-1 w-4 h-4" />Video Preview</x-ui.button>
                            </div>
                            <p class="text-sm text-zinc-600 dark:text-gray-300">Thanks for using Genesis ✌️</p>
                        </div>
                        <img src="https://cdn.devdojo.com/images/february2024/dashboards.png" alt="Dashboard" class="object-cover w-2/3 h-full rounded-lg" />
                    </div>
                </div>
            </div>
        </div>
=======
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
>>>>>>> 350420cb (Check & fix styling)
    @endvolt
</x-layouts.app>
