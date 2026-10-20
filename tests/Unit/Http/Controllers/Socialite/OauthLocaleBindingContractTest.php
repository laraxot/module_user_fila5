<?php

declare(strict_types=1);

use Modules\User\Http\Controllers\Socialite\ProcessCallbackController;
use Modules\User\Http\Controllers\Socialite\RedirectToProviderController;
use PHPUnit\Framework\Assert;
use ReflectionMethod;

/**
 * Contratto: con URI {lang}/auth/login/{provider} i controller devono dichiarare
 * $lang e $provider, altrimenti Laravel lega "it" a $provider.
 */
test('RedirectToProviderController declares lang before provider', function (): void {
    $method = new ReflectionMethod(RedirectToProviderController::class, '__invoke');
    $names = array_map(static fn ($p) => $p->getName(), $method->getParameters());

    Assert::assertContains('lang', $names);
    Assert::assertContains('provider', $names);

    $langPos = array_search('lang', $names, true);
    $providerPos = array_search('provider', $names, true);
    Assert::assertIsInt($langPos);
    Assert::assertIsInt($providerPos);
    Assert::assertLessThan($providerPos, $langPos);
});

test('ProcessCallbackController declares lang before provider', function (): void {
    $method = new ReflectionMethod(ProcessCallbackController::class, '__invoke');
    $names = array_map(static fn ($p) => $p->getName(), $method->getParameters());

    Assert::assertContains('lang', $names);
    Assert::assertContains('provider', $names);

    $langPos = array_search('lang', $names, true);
    $providerPos = array_search('provider', $names, true);
    Assert::assertIsInt($langPos);
    Assert::assertIsInt($providerPos);
    Assert::assertLessThan($providerPos, $langPos);
});
