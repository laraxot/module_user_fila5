<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Modules\User\Datas\PasswordData;
use PHPUnit\Framework\Assert;

test('password data labels are translated', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    // Arrange
    app()->setLocale('it');

    $passwordData = PasswordData::make();
    $passwordData->setFieldName('password');

    // Act
    $passwordComponent = $passwordData->getPasswordFormComponent('password');
    $confirmationComponent = $passwordData->getPasswordConfirmationFormComponent();

    // Assert
    Assert::assertSame('Parola d\'ordine', $passwordComponent->getLabel());
    Assert::assertSame('Conferma Password', $confirmationComponent->getLabel());
});

test('login form labels are translated', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('Login Livewire form labels — coperto da widget Filament LoginWidgetTest');
});
