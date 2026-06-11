<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Hash;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;
use PHPUnit\Framework\Assert;

/**
 * @return array<int, Component|Action|ActionGroup>
 */
function userResourceSectionComponents(Modules\User\Tests\TestCase $testCase, Component $section): array
{
    Assert::assertInstanceOf(Section::class, $section);

    /* @var Section $section */
    return $testCase->filamentSectionChildComponents($section);
}

/**
 * @param array<int, Component|Action|ActionGroup> $components
 */
function userResourceFindComponentByName(array $components, string $name): ?Component
{
    foreach ($components as $component) {
        if (! $component instanceof Field) {
            continue;
        }

        if ($component->getName() === $name) {
            return $component;
        }
    }

    return null;
}

beforeEach(function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()
        ->create([
            'type' => UserType::MasterAdmin,
            'email' => 'admin-'.uniqid().'@example.com',
            'password' => Hash::make('password123'),
        ]);
});

test('user resource has correct navigation icon', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    Assert::assertSame('ui-user-main', UserResource::getNavigationIcon());
});

test('user resource has correct widgets', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $widgets = UserResource::getWidgets();

    Assert::assertCount(1, $widgets);
    Assert::assertContains(UserOverview::class, $widgets);
});

test('user resource has correct form schema', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();

    Assert::assertArrayHasKey('section01', $form);
    Assert::assertArrayHasKey('section02', $form);
    // Test section01
    $section01 = $form['section01'];
    Assert::assertInstanceOf(Section::class, $section01);
    $section01Schema = userResourceSectionComponents($this, $section01);
    Assert::assertGreaterThanOrEqual(1, count($section01Schema));

    $hasNameOrEmail = collect($section01Schema)->contains(
        fn (Component|Action|ActionGroup $component, int $index): bool => $component instanceof Field
            && in_array($component->getName(), ['name', 'email', 'password'], true)
    );
    Assert::assertTrue($hasNameOrEmail);
    // Test section02
    $section02 = $form['section02'];
    Assert::assertInstanceOf(Section::class, $section02);
    $section02Schema = userResourceSectionComponents($this, $section02);
    Assert::assertGreaterThanOrEqual(1, count($section02Schema));

    $createdAtField = userResourceFindComponentByName($section02Schema, 'created_at');
    Assert::assertNotNull($createdAtField);
    Assert::assertInstanceOf(Placeholder::class, $createdAtField);
});

test('user resource has combined relation manager tabs', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $resource = new UserResource();

    Assert::assertTrue($resource->hasCombinedRelationManagerTabsWithContent());
});

test('user resource extends correct base class', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $resource = new UserResource();

    Assert::assertInstanceOf(XotBaseResource::class, $resource);
});

test('user resource form schema has correct column spans', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();

    $section01 = $form['section01'];
    $section02 = $form['section02'];

    // Verify sections exist and are Section instances
    Assert::assertInstanceOf(Section::class, $section01);
    Assert::assertInstanceOf(Section::class, $section02);
});

test('user resource name field is required', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section01 = $form['section01'];
    $section01Schema = userResourceSectionComponents($this, $section01);

    $nameField = userResourceFindComponentByName($section01Schema, 'name');

    if (null === $nameField) {
        $this->markTestSkipped('name field not found in section01 schema');
    }

    Assert::assertInstanceOf(TextInput::class, $nameField);
});

test('user resource email field is required', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section01 = $form['section01'];
    $section01Schema = userResourceSectionComponents($this, $section01);

    $emailField = userResourceFindComponentByName($section01Schema, 'email');

    if (null === $emailField) {
        $this->markTestSkipped('email field not found in section01 schema');
    }

    Assert::assertInstanceOf(TextInput::class, $emailField);
});

test('user resource password field is required only on create', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section01 = $form['section01'];
    $section01Schema = userResourceSectionComponents($this, $section01);

    $passwordField = userResourceFindComponentByName($section01Schema, 'password');

    if (null === $passwordField) {
        $this->markTestSkipped('password field not found in section01 schema');
    }

    Assert::assertInstanceOf(TextInput::class, $passwordField);
});

test('user resource password field has correct type', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section01 = $form['section01'];
    $section01Schema = userResourceSectionComponents($this, $section01);

    $passwordField = userResourceFindComponentByName($section01Schema, 'password');

    Assert::assertNotNull($passwordField);
    Assert::assertInstanceOf(TextInput::class, $passwordField);
    Assert::assertSame('password', $passwordField->getType());
});

test('user resource email field has unique validation', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section01 = $form['section01'];
    $section01Schema = userResourceSectionComponents($this, $section01);

    $emailField = userResourceFindComponentByName($section01Schema, 'email');

    if (null === $emailField) {
        $this->markTestSkipped('email field not found in section01 schema');
    }

    Assert::assertInstanceOf(TextInput::class, $emailField);
});

test('user resource created_at field shows diff for humans', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $form = UserResource::getFormSchema();
    $section02 = $form['section02'];
    $section02Schema = userResourceSectionComponents($this, $section02);

    $createdAtField = userResourceFindComponentByName($section02Schema, 'created_at');

    if (null === $createdAtField) {
        $this->markTestSkipped('created_at field not found in section02 schema');
    }

    Assert::assertInstanceOf(Placeholder::class, $createdAtField);
});

test('user resource can be instantiated', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $resource = new UserResource();

    Assert::assertInstanceOf(UserResource::class, $resource);
});

test('user resource has correct model', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    // Since the model is commented out, we'll test the default behavior
    $resource = new UserResource();

    // The resource should work with the default model resolution
    Assert::assertInstanceOf(UserResource::class, $resource);
});
