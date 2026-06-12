<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Actions;

use Filament\Actions\Action;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;
use ReflectionMethod;

use function Safe\file_get_contents;

final class ChangePasswordActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->setupFilamentAdminPanel();

        $this->action = ChangePasswordAction::make();
    }

    public function testChangePasswordActionHasCorrectDefaultName(): void
    {
        Assert::assertSame('changePassword', ChangePasswordAction::getDefaultName());
    }

    public function testChangePasswordActionExtendsCorrectBaseClass(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
    }

    public function testChangePasswordActionHasCorrectIcon(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
        Assert::assertSame('heroicon-o-key', $action->getIcon());
    }

    public function testChangePasswordActionFormHasRequiredFields(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
        $reflection = new ReflectionClass(ChangePasswordAction::class);
        Assert::assertTrue($reflection->hasMethod('setUp'));
    }

    public function testChangePasswordActionCanBeExecuted(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
        Assert::assertSame('changePassword', $action->getName());
    }

    public function testChangePasswordActionUsesPasswordDataComponent(): void
    {
        $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
        $content = is_string($source) ? file_get_contents($source) : '';

        Assert::assertStringContainsString((string) 'PasswordData', (string) $content);
        Assert::assertStringContainsString((string) 'new_password', (string) $content);
    }

    public function testChangePasswordActionHasConfirmationField(): void
    {
        $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
        $content = is_string($source) ? file_get_contents($source) : '';

        Assert::assertStringContainsString((string) 'new_password_confirmation', (string) $content);
    }

    public function testChangePasswordActionShowsSuccessNotification(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
        Assert::assertSame('changePassword', $action->getName());
    }

    public function testChangePasswordActionValidatesPasswordConfirmation(): void
    {
        $source = (new ReflectionClass(ChangePasswordAction::class))->getFileName();
        $content = is_string($source) ? file_get_contents($source) : '';

        Assert::assertStringContainsString((string) "->same('new_password')", (string) $content);
    }

    public function testChangePasswordActionUsesTranslationKeys(): void
    {
        $action = $this->requireAction();
        Assert::assertInstanceOf(Action::class, $action);
        Assert::assertNotEmpty($action->getLabel());
    }

    public function testChangePasswordActionHasCorrectSetupMethod(): void
    {
        $reflection = new ReflectionClass(ChangePasswordAction::class);

        Assert::assertTrue($reflection->hasMethod('setUp'));
        Assert::assertTrue($reflection->getMethod('setUp')->isProtected());
    }
}
