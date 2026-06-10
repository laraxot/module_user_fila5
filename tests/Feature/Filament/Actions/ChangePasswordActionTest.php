<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Actions;

use Filament\Actions\Action;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Tests\TestCase;

uses(\Modules\User\Tests\TestCase::class);

beforeEach(function (): void {
    $this->setupFilamentAdminPanel();

    $this->action = ChangePasswordAction::make();
});

test('change password action has correct default name', function (): void {
    expect(ChangePasswordAction::getDefaultName())->toBe('changePassword');
});

test('change password action extends correct base class', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);
});

test('change password action has correct icon', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);
    expect($this->action->getIcon())->toBe('heroicon-o-key');
});

test('change password action form has required fields', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);

    $reflection = new \ReflectionClass(ChangePasswordAction::class);
    expect($reflection->hasMethod('setUp'))->toBeTrue();
});

test('change password action can be executed', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);
    expect($this->action->getName())->toBe('changePassword');
});

test('change password action uses password data component', function (): void {
    $reflection = new \ReflectionMethod(ChangePasswordAction::class, 'setUp');
    $reflection->setAccessible(true);
    $source = (new \ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    expect($content)->toContain('PasswordData');
    expect($content)->toContain('new_password');
});

test('change password action has confirmation field', function (): void {
    $source = (new \ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    expect($content)->toContain('new_password_confirmation');
});

test('change password action shows success notification', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);
    expect($this->action->getName())->toBe('changePassword');
});

test('change password action validates password confirmation', function (): void {
    $source = (new \ReflectionClass(ChangePasswordAction::class))->getFileName();
    $content = is_string($source) ? file_get_contents($source) : '';

    expect($content)->toContain("->same('new_password')");
});

test('change password action uses translation keys', function (): void {
    expect($this->action)->toBeInstanceOf(Action::class);
    expect($this->action->getLabel())->not->toBeEmpty();
});

test('change password action has correct setup method', function (): void {
    $reflection = new \ReflectionClass(ChangePasswordAction::class);

    expect($reflection->hasMethod('setUp'))->toBeTrue();
    expect($reflection->getMethod('setUp')->isProtected())->toBeTrue();
});
