<?php

declare(strict_types=1);

use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware(['guest']);
name('login');

new class extends Component {
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false;

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('user::login.actions.login.error'));

            return;
        }

        event(new Login(auth()->guard('web'), User::where('email', $this->email)->first(), $this->remember));

        return redirect()->intended('/');
    }
};

?>

<x-layouts.guest>
    <x-slot name="title">
        {{ __('user::login.title') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('user::login.subtitle_start') }}
        <x-ui.text-link href="{{ route('register') }}">{{ __('user::login.subtitle_link') }}</x-ui.text-link>
    </x-slot>

    @volt('auth.login')
    <div class="relative min-h-[calc(100vh-4rem)] flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 px-4 py-8">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="w-full h-full bg-[url('/storage/app/public/images/hero-pattern.svg')] bg-cover bg-center opacity-5 animate-[gradient-shift_15s_ease-in-out_infinite]" style="background-position: 0% 50%;"></div>
            <div class="absolute inset-0 -z-10">
                <canvas id="bg-canvas" class="w-full h-full" aria-hidden="true"></canvas>
            </div>
        </div>
        
        <!-- Glassmorphism Card -->
        <div class="relative z-10 w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg border border-white/20 dark:border-gray-700/30 shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8 space-y-6">
                <!-- Logo -->
                <div class="flex items-center justify-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-2xl drop-shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c2.21 0 4 1.79 4 4h2c0-3.31-2.69-6-6-6zm0 16c-2.21 0-4-1.79-4-4h-2c0 3.31 2.69 6 6 6z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Title -->
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                        {{ __('user::login.title') }}
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 max-w-xl">
                        {{ __('user::login.subtitle_start') }}
                    </p>
                </div>
                
                <!-- Login Form -->
                <form wire:submit.prevent="authenticate" class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            {{ __('user::login.fields.email.label') }}
                        </label>
                        <div class="relative">
                            <x-ui.input 
                                id="email"
                                type="email"
                                name="email"
                                wire:model="email"
                                placeholder="{{ __('user::login.fields.email.placeholder') }}"
                                class="w-full pl-10"
                            />
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            {{ __('user::login.fields.password.label') }}
                        </label>
                        <div class="relative">
                            <x-ui.input 
                                id="password"
                                type="password"
                                name="password"
                                wire:model="password"
                                placeholder="{{ __('user::login.fields.password.placeholder') }}"
                                class="w-full pl-10"
                            />
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2zM12 7a3 3 0 100-6m0 6a3 3 0 110 6z"/>
                                </svg>
                            </div>
                            <button type="button" 
                                    wire:click="$toggle('passwordShow')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                    :class="{'text-blue-500': $passwordShow}"
                            >
                                <template x-if="!passwordShow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h3l-4 4 4 4H9l5-5z"/>
                                    </svg>
                                </template>
                                <template x-if="passwordShow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                </template>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between mt-4 text-sm leading-5">
                        <div class="flex items-center">
                            <x-ui.checkbox 
                                id="remember"
                                name="remember"
                                wire:model="remember"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                            />
                            <span class="ml-2 text-gray-700 dark:text-gray-300">
                                {{ __('user::login.fields.remember.label') }}
                            </span>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <x-ui.text-link 
                                href="{{ route('password.request') }}"
                                class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                            >
                                {{ __('user::login.actions.forgot_password.label') }}
                            </x-ui.text-link>
                        @endif
                    </div>
                    
                    <div>
                        <x-ui.button 
                            type="primary" 
                            rounded="md" 
                            submit="true" 
                            class="w-full py-3 text-lg font-medium flex items-center justify-center gap-2"
                            wire:loading.attr="disabled"
                        >
                            <template x-if="!$wire.loading">
                                {{ __('user::login.actions.login.label') }}
                            </template>
                            <template x-if="$wire.loading">
                                <div class="flex items-center justify-center">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                    <span class="ml-2"> {{ __('user::auth.login.logging_in.text') }} </span>
                                </div>
                            </template>
                        </x-ui.button>
                    </div>
                </form>
                
                <!-- Social Login -->
                @php
                    $hasGoogle = (bool) config('services.google.client_id');
                    $hasMicrosoft = (bool) config('services.microsoft.client_id');
                    $hasGithub = (bool) config('services.github.client_id');
                    $hasAnySocial = $hasGoogle || $hasMicrosoft || $hasGithub;
                @endphp
                
                @if ($hasAnySocial)
                    <div class="mt-6">
                        <div class="flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 border-t border-gray-200 dark:border-gray-600"></div>
                            <span class="px-2 text-gray-500 dark:text-gray-400">
                                {{ __('user::auth.login.or_continue_with.text') }}
                            </span>
                            <div class="w-0 flex-1 border-t border-gray-200 dark:border-gray-600"></div>
                        </div>
                        
                        <div class="mt-4 grid gap-3">
                            <div class="grid-cols-1 sm:grid-cols-3 gap-3">
                                @if ($hasGoogle)
                                    <a href="{{ route('socialite.oauth.fo.redirect', ['provider' => 'google']) }}"
                                       class="flex items-center justify-center px-4 py-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-300 hover:shadow transition-all duration-200 focus:outline-none focus:ring-2 focus-offset-2 focus-ring-indigo-500"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15l-3-3m0 0l3-3m-3 3h2.268A11.952 11.952 0 0012 4.057a9.004 9.004 0 018.944 3.001A5.988 5.988 0 0019.757 9c-.658 2.093-1.85 3.902-3.38 5.301a11.917 11.917 0 01-2.502 6.77A11.917 11.917 0 013.922 18.912a5.988 5.988 0 00-.5.43A11.952 11.952 0 0112 15z"></path>
                                        </svg>
                                        <span>{{ __('user::auth.login.google.text') }}</span>
                                    </a>
                                @endif
                                
                                @if ($hasMicrosoft)
                                    <a href="{{ route('socialite.oauth.fo.redirect', ['provider' => 'microsoft']) }}"
                                       class="flex items-center justify-center px-4 py-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-300 hover:shadow transition-all duration-200 focus:outline-none focus:ring-2 focus-offset-2 focus-ring-indigo-500"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15l-3-3m0 0l3-3m-3 3h2.268A11.952 11.952 0 0012 4.057a9.004 9.004 0 018.944 3.001A5.988 988 5.988 0 0019.757 9c-.658 2.093-1.85 3.902-3.38 5.301a11.917 11.917 0 01-2.502 6.77A11.917 11.917 0 013.922 18.912a5.988 5.988 0 00-.5.43A11.952 11.952 0 0112 15z"></path>
                                        </svg>
                                        <span>{{ __('user::auth.login.microsoft.text') }}</span>
                                    </a>
                                @endif
                                
                                @if ($hasGithub)
                                    <a href="{{ route('socialite.oauth.fo.redirect', ['provider' => 'github']) }}"
                                       class="flex items-center justify-center px-4 py-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-300 hover:shadow transition-all duration-200 focus:outline-none focus:ring-2 focus-offset-2 focus-ring-indigo-500"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.31c-.146-.53-.27-1.01-.435-1.43a10.066 10.066 0 00-.3-2.31c-.073-.51-.12-1.02-.182-1.51C20.8 8.62 20.3 7 19.5 6.11C18.28 5.07 16.8 4.25 15.11 4.05a7.96 7.96 0 00-2.12-.58l-2.96-.66c-.74-.16-1.5-.16-2.24 0l-2.96.66a7.96 7.96 0 00-2.12.58c-1.69.2-3.2 1.08-4.11 2.47a11.966 11.966 0 01-3.34-1.67c-.28-.56-.42-1.2-.42-1.87 0-.66.13-1.29.35-1.82a11.952 11.952 0 016.443-2.88 12.073 12.073 0 003.922.72l1.954.436c.195.044.39.096.573.167a6.013 6.013 0 01-.618-2.105L15.31 3.23a2.26 2.26 0 00-2.59-.43l-1.18-.44a2.26 2.26 0 00-1.07-2.11 2.26 2.26 0 012.18-.34l1.49.38c.44.11.89.19 1.33.28a1.52 1.52 0 01-.29-.87 1.52 1.52 0 001.06-.94 2.53 2.53 0 002.53 2.53z"></path>
                                        </svg>
                                        <span>{{ __('user::auth.login.github.text') }}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Register CTA -->
                @if (Route::has('register'))
                    <div class="mt-8 text-center text-sm">
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ __('user::login.no_account.text') }}
                        </p>
                        <a href="{{ route('register') }}" 
                           class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200 inline-block"
                        >
                            {{ __('user::login.create_account.text') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- GSAP Animations -->
    <script type="module">
        import { gsap } from 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.js';
        import { ScrollTrigger } from 'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.js';
        
        gsap.registerPlugin(ScrollTrigger);
        
        // Animate form elements on load
        document.addEventListener('LIVEWIRE_INIT', () => {
            const formElements = document.querySelectorAll('.filament-widget-login input, .filament-widget-login label, .filament-widget-login button, .filament-widget-login .text-center');
            
            formElements.forEach((el, index) => {
                gsap.from(el, {
                    opacity: 0,
                    y: 20,
                    duration: 0.6,
                    delay: index * 0.1,
                    ease: 'power3.out'
                });
            });
            
            // Animate logo
            const logo = document.querySelector('.filament-widget-login svg');
            if (logo) {
                gsap.from(logo, {
                    opacity: 0,
                    scale: 0.5,
                    duration: 0.8,
                    ease: 'elastic.out(1, 0.5)'
                });
            }
            
            // Button hover effects
            const buttons = document.querySelectorAll('.filament-widget-login button');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', () => {
                    gsap.to(button, {
                        scale: 1.05,
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                });
                
                button.addEventListener('mouseleave', () => {
                    gsap.to(button, {
                        scale: 1,
                        duration: 0.3,
                        ease: 'power2.in'
                    });
                });
            });
        });
        
        // Animated background with Three.js style particles (simplified)
        document.addEventListener('LIVEWIRE_INIT', () => {
            const canvas = document.getElementById('bg-canvas');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                
                function resizeCanvas() {
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                }
                
                window.addEventListener('resize', resizeCanvas);
                resizeCanvas();
                
                const particles = [];
                const particleCount = 50;
                
                for (let i = 0; i < particleCount; i++) {
                    particles.push({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        radius: Math.random() * 2 + 1,
                        color: `rgba(30, 90, 150, ${Math.random() * 0.1 + 0.05})`,
                        speedX: (Math.random() - 0.5) * 0.5,
                        speedY: (Math.random() - 0.5) * 0.5
                    });
                }
                
                function animateParticles() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    
                    for (const p of particles) {
                        p.x += p.speedX;
                        p.y += p.speedY;
                        
                        // Bounce off edges
                        if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
                        if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
                        
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                        ctx.fillStyle = p.color;
                        ctx.fill();
                    }
                    
                    requestAnimationFrame(animateParticles);
                }
                
                animateParticles();
            }
        });
    </script>
    @endvolt
</x-layouts.guest>