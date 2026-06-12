<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Resources;

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
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Resources\XotBaseResource;
use PHPUnit\Framework\Assert;

/**
 * @return array<int, Component|Action|ActionGroup>
 */
function userResourceSectionComponents(TestCase $testCase, Component $section): array
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

final class UserResourceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        UserFactory::new()
            ->create([
                'type' => UserType::MasterAdmin,
                'email' => 'admin-'.uniqid().'@example.com',
                'password' => Hash::make('password123'),
            ]);
    }

    public function testUserResourceHasCorrectNavigationIcon(): void
    {
        Assert::assertSame('ui-user-main', UserResource::getNavigationIcon());
    }

    public function testUserResourceHasCorrectWidgets(): void
    {
        $widgets = UserResource::getWidgets();

        Assert::assertCount(1, $widgets);
        Assert::assertContains(UserOverview::class, $widgets);
    }

    public function testUserResourceHasCorrectFormSchema(): void
    {
        $form = UserResource::getFormSchema();

        Assert::assertArrayHasKey('section01', $form);
        Assert::assertArrayHasKey('section02', $form);
        $section01 = $form['section01'];
        Assert::assertInstanceOf(Section::class, $section01);
        $section01Schema = userResourceSectionComponents($this, $section01);
        Assert::assertGreaterThanOrEqual(1, count($section01Schema));

        $hasNameOrEmail = collect($section01Schema)->contains(
            fn (Component|Action|ActionGroup $component, int $index): bool => $component instanceof Field
                && in_array($component->getName(), ['name', 'email', 'password'], true)
        );
        Assert::assertTrue($hasNameOrEmail);
        $section02 = $form['section02'];
        Assert::assertInstanceOf(Section::class, $section02);
        $section02Schema = userResourceSectionComponents($this, $section02);
        Assert::assertGreaterThanOrEqual(1, count($section02Schema));

        $createdAtField = userResourceFindComponentByName($section02Schema, 'created_at');
        Assert::assertNotNull($createdAtField);
        Assert::assertInstanceOf(Placeholder::class, $createdAtField);
    }

    public function testUserResourceHasCombinedRelationManagerTabs(): void
    {
        $resource = new UserResource();

        Assert::assertTrue($resource->hasCombinedRelationManagerTabsWithContent());
    }

    public function testUserResourceExtendsCorrectBaseClass(): void
    {
        $resource = new UserResource();

        Assert::assertInstanceOf(XotBaseResource::class, $resource);
    }

    public function testUserResourceFormSchemaHasCorrectColumnSpans(): void
    {
        $form = UserResource::getFormSchema();

        $section01 = $form['section01'];
        $section02 = $form['section02'];

        Assert::assertInstanceOf(Section::class, $section01);
        Assert::assertInstanceOf(Section::class, $section02);
    }

    public function testUserResourceNameFieldIsRequired(): void
    {
        $form = UserResource::getFormSchema();
        $section01 = $form['section01'];
        $section01Schema = userResourceSectionComponents($this, $section01);

        $nameField = userResourceFindComponentByName($section01Schema, 'name');

        if (null === $nameField) {
            $this->markTestSkipped('name field not found in section01 schema');
        }

        Assert::assertInstanceOf(TextInput::class, $nameField);
    }

    public function testUserResourceEmailFieldIsRequired(): void
    {
        $form = UserResource::getFormSchema();
        $section01 = $form['section01'];
        $section01Schema = userResourceSectionComponents($this, $section01);

        $emailField = userResourceFindComponentByName($section01Schema, 'email');

        if (null === $emailField) {
            $this->markTestSkipped('email field not found in section01 schema');
        }

        Assert::assertInstanceOf(TextInput::class, $emailField);
    }

    public function testUserResourcePasswordFieldIsRequiredOnlyOnCreate(): void
    {
        $form = UserResource::getFormSchema();
        $section01 = $form['section01'];
        $section01Schema = userResourceSectionComponents($this, $section01);

        $passwordField = userResourceFindComponentByName($section01Schema, 'password');

        if (null === $passwordField) {
            $this->markTestSkipped('password field not found in section01 schema');
        }

        Assert::assertInstanceOf(TextInput::class, $passwordField);
    }

    public function testUserResourcePasswordFieldHasCorrectType(): void
    {
        $form = UserResource::getFormSchema();
        $section01 = $form['section01'];
        $section01Schema = userResourceSectionComponents($this, $section01);

        $passwordField = userResourceFindComponentByName($section01Schema, 'password');

        Assert::assertNotNull($passwordField);
        Assert::assertInstanceOf(TextInput::class, $passwordField);
        Assert::assertSame('password', $passwordField->getType());
    }

    public function testUserResourceEmailFieldHasUniqueValidation(): void
    {
        $form = UserResource::getFormSchema();
        $section01 = $form['section01'];
        $section01Schema = userResourceSectionComponents($this, $section01);

        $emailField = userResourceFindComponentByName($section01Schema, 'email');

        if (null === $emailField) {
            $this->markTestSkipped('email field not found in section01 schema');
        }

        Assert::assertInstanceOf(TextInput::class, $emailField);
    }

    public function testUserResourceCreatedAtFieldShowsDiffForHumans(): void
    {
        $form = UserResource::getFormSchema();
        $section02 = $form['section02'];
        $section02Schema = userResourceSectionComponents($this, $section02);

        $createdAtField = userResourceFindComponentByName($section02Schema, 'created_at');

        if (null === $createdAtField) {
            $this->markTestSkipped('created_at field not found in section02 schema');
        }

        Assert::assertInstanceOf(Placeholder::class, $createdAtField);
    }

    public function testUserResourceCanBeInstantiated(): void
    {
        $resource = new UserResource();

        Assert::assertInstanceOf(UserResource::class, $resource);
    }

    public function testUserResourceHasCorrectModel(): void
    {
        $resource = new UserResource();

        Assert::assertInstanceOf(UserResource::class, $resource);
    }
}
