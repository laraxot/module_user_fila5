<?php

declare(strict_types=1);

use Modules\User\Actions\User\UpdateUserAction;
use Modules\User\Datas\UpdateUserData;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);

describe('UpdateUserAction', function (): void {
    test('action is accessible via app', function (): void {
        Assert::assertInstanceOf(UpdateUserAction::class, app(UpdateUserAction::class));
    });

    test('action has execute method', function (): void {
        $action = app(UpdateUserAction::class);
    });

    test('execute method accepts user and a typed UpdateUserData parameter', function (): void {
        $action = app(UpdateUserAction::class);

        $reflection = new ReflectionMethod($action, 'execute');
        $params = $reflection->getParameters();

        Assert::assertCount(2, $params);
        Assert::assertSame('user', $params[0]->getName());
        Assert::assertSame('data', $params[1]->getName());
        Assert::assertSame(UpdateUserData::class, $params[1]->getType()?->getName());
    });
});
