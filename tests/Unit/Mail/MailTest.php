<?php

declare(strict_types=1);

use Modules\User\Mail\TeamInvitation;
use Modules\User\Models\TeamInvitation as TeamInvitationModel;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('TeamInvitation mail can be instantiated', function () {
    Assert::assertTrue(class_exists(TeamInvitation::class));

<<<<<<< HEAD
    $model = new TeamInvitationModel();
=======
<<<<<<< HEAD
    $model = new TeamInvitationModel;
=======
    $model = new TeamInvitationModel();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    $model->forceFill([
        'email' => 'test@example.com',
    ]);

<<<<<<< HEAD
    $mail = new TeamInvitation();
=======
<<<<<<< HEAD
    $mail = new TeamInvitation;
=======
    $mail = new TeamInvitation();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    $mail->invitation = $model;

    Assert::assertInstanceOf(TeamInvitation::class, $mail);
    Assert::assertSame($model, $mail->invitation);
});

test('TeamInvitation has expected methods', function () {
    Assert::assertTrue(class_exists(TeamInvitation::class));
});
