<?php

declare(strict_types=1);

use Modules\User\Actions\User\CreateUserAction;
use Modules\User\Datas\CreateUserData;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);

describe('CreateUserAction', function (): void {
    test('action is accessible via app', function (): void {
        Assert::assertInstanceOf(CreateUserAction::class, app(CreateUserAction::class));
    });

    test('action has execute method', function (): void {
        $action = app(CreateUserAction::class);
    });

    test('execute method accepts a typed CreateUserData parameter', function (): void {
        $action = app(CreateUserAction::class);

        $reflection = new ReflectionMethod($action, 'execute');
        $params = $reflection->getParameters();

        Assert::assertCount(1, $params);
        Assert::assertSame('data', $params[0]->getName());
        Assert::assertSame(CreateUserData::class, $params[0]->getType()?->getName());
    });
});
