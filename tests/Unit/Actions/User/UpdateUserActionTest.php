<?php

declare(strict_types=1);

use Modules\User\Actions\User\UpdateUserAction;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('no-user-db');
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

describe('UpdateUserAction', function (): void {
    test('action is accessible via app', function (): void {
        Assert::assertInstanceOf(UpdateUserAction::class, app(UpdateUserAction::class));
    });

    test('action has execute method', function (): void {
        $action = app(UpdateUserAction::class);
<<<<<<< HEAD

        Assert::assertTrue(method_exists($action, 'execute'));
=======
>>>>>>> laraxot/dev
    });

    test('execute method accepts user and data parameters', function (): void {
        $action = app(UpdateUserAction::class);

        $reflection = new ReflectionMethod($action, 'execute');
        $params = $reflection->getParameters();

        Assert::assertCount(2, $params);
        Assert::assertSame('user', $params[0]->getName());
        Assert::assertSame('data', $params[1]->getName());
    });
});
