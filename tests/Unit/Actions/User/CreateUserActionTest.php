<?php

declare(strict_types=1);

use Modules\User\Actions\User\CreateUserAction;
use PHPUnit\Framework\Assert;

uses(PHPUnit\Framework\TestCase::class);

describe('CreateUserAction', function (): void {
    test('action can be instantiated', function (): void {
        Assert::assertInstanceOf(CreateUserAction::class, new CreateUserAction());
    });

    test('action has execute method', function (): void {
        $action = new CreateUserAction();

        Assert::assertTrue(method_exists($action, 'execute'));
    });

    test('execute method accepts array parameter', function (): void {
        $action = new CreateUserAction();

        $reflection = new ReflectionMethod($action, 'execute');
        $params = $reflection->getParameters();

        Assert::assertCount(1, $params);
        Assert::assertSame('data', $params[0]->getName());
    });
});
