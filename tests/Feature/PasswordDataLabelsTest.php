<?php

declare(strict_types=1);

namespace Tests\Modules\User\Feature;

use Modules\User\Datas\PasswordData;
use Tests\Modules\User\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Password Data Labels', function (): void {
    test('password data labels are translated', function (): void {
        app()->setLocale('it');

        $passwordData = PasswordData::make();
        $passwordData->setFieldName('password');

        $passwordComponent = $passwordData->getPasswordFormComponent('password');
        $confirmationComponent = $passwordData->getPasswordConfirmationFormComponent();

        Assert::assertSame('Parola d\'ordine', $passwordComponent->getLabel());
        Assert::assertSame('Conferma Password', $confirmationComponent->getLabel());
    });

    test('login form labels are translated', function (): void {
        /* @var TestCase $this */
        $this->skipTest('Login Livewire form labels — coperto da widget Filament LoginWidgetTest');
    });
});
