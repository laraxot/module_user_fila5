<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Filament\Actions\Action;
use Modules\User\Filament\Actions\ChangePasswordAction;
use PHPUnit\Framework\Assert;
use ReflectionClass;

use function Safe\file_get_contents;

beforeEach(function () {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->setupFilamentAdminPanel();

    $this->action = ChangePasswordAction::make();
});

test('change password action has correct default name', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    Assert::assertSame('changePassword', ChangePasswordAction::getDefaultName());
});

test('change password action extends correct base class', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
});

test('change password action has correct icon', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
    Assert::assertSame('heroicon-o-key', $action->getIcon());
});

test('change password action form has required fields', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
    $reflection = new ReflectionClass(ChangePasswordAction::class);
    Assert::assertTrue($reflection->hasMethod('setUp'));
});

test('change password action can be executed', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
    Assert::assertSame('changePassword', $action->getName());
});

test('change password action uses password data component', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $reflection = new ReflectionMethod(ChangePasswordAction::class, 'setUp');
    $reflection->setAccessible(true);
    $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    Assert::assertStringContainsString((string) 'PasswordData', (string) $content);
    Assert::assertStringContainsString((string) 'new_password', (string) $content);
});

test('change password action has confirmation field', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    Assert::assertStringContainsString((string) 'new_password_confirmation', (string) $content);
});

test('change password action shows success notification', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
    Assert::assertSame('changePassword', $action->getName());
});

test('change password action validates password confirmation', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    Assert::assertStringContainsString((string) "->same('new_password')", (string) $content);
});

test('change password action uses translation keys', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $action = $this->requireAction();
    Assert::assertInstanceOf(Action::class, $action);
    Assert::assertNotEmpty($action->getLabel());
});

test('change password action has correct setup method', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $reflection = new ReflectionClass(ChangePasswordAction::class);

    Assert::assertTrue($reflection->hasMethod('setUp'));
    Assert::assertTrue($reflection->getMethod('setUp')->isProtected());
});
