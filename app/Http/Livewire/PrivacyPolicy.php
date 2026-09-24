<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
<<<<<<< HEAD

use function Safe\file_get_contents;

=======
use Modules\Tenant\Actions\Markdown\GetLocalizedMarkdownPathAction;

use function Safe\file_get_contents;

use Webmozart\Assert\Assert;

>>>>>>> laraxot/dev
class PrivacyPolicy extends Component
{
    /**
     * Show the terms of service for the application.
     */
    public function render(): View
    {
<<<<<<< HEAD
        /** @var view-string $viewName */
        $viewName = 'user::livewire.privacy-policy';
        $policyFile = resource_path('markdown/privacy-policy.md');
        $policyContent = file_get_contents($policyFile);
        $view = view($viewName, [
            'terms' => Str::markdown($policyContent),
        ]);

        $view->layout('filament::components.layouts.base', [
            'title' => __('user::profile.privacy_policy.title'),
=======
        $policyFile = app(GetLocalizedMarkdownPathAction::class)->execute('policy.md');
        Assert::string($policyFile, 'Policy file path must be a string');
        if ('' === $policyFile || '#' === $policyFile) {
            throw new \RuntimeException('Policy file path is empty or invalid');
        }
        /**
         * @phpstan-var view-string
         */
        $view_name = 'filament-jet::livewire.privacy-policy';
        $view_params = [
            'terms' => Str::markdown(file_get_contents($policyFile)),
        ];
        $view = view($view_name, $view_params);

        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.privacy_policy'),
>>>>>>> laraxot/dev
        ]);

        return $view;
    }
}
