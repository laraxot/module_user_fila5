<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Filament\Clusters\Appearance;
use Modules\User\Filament\Clusters\Appearance\Pages\Alignment;
use Modules\User\Filament\Clusters\Appearance\Pages\Background;
use Modules\User\Filament\Clusters\Appearance\Pages\Colors;
use Modules\User\Filament\Clusters\Appearance\Pages\CustomCss;
use Modules\User\Filament\Clusters\Appearance\Pages\Favicon;
use Modules\User\Filament\Clusters\Appearance\Pages\Logo;
use Modules\Xot\Filament\Clusters\XotBaseCluster;
use Modules\Xot\Filament\Pages\XotBasePage;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;
use function Safe\glob;

test('Appearance cluster extends XotBaseCluster', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    Assert::assertSame(XotBaseCluster::class, get_parent_class(Appearance::class));
});

test('all cluster pages extend XotBasePage', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $pages = [
        Alignment::class,
        Background::class,
        Colors::class,
        CustomCss::class,
        Favicon::class,
        Logo::class,
    ];

    foreach ($pages as $pageClass) {
        Assert::assertSame(XotBasePage::class, get_parent_class($pageClass));
    }
});

test('all cluster pages have cluster property set', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $pages = [
        Alignment::class,
        Background::class,
        Colors::class,
        CustomCss::class,
        Favicon::class,
        Logo::class,
    ];

    foreach ($pages as $pageClass) {
        $reflection = new ReflectionClass($pageClass);
        $property = $reflection->getProperty('cluster');
        $defaultValue = $property->getDefaultValue();

        Assert::assertSame(Appearance::class, $defaultValue);
    }
});

test('cluster pages do not extend Filament classes directly', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $files = glob(base_path('Modules/User/app/Filament/Clusters/Appearance/Pages/*.php'));

    if ([] === $files) {
        $this->markTestSkipped('Appearance cluster pages directory not found.');
    }

    foreach ($files as $file) {
        $filePath = (string) $file;
        $content = (string) file_get_contents($filePath);
        Assert::assertStringContainsString('extends XotBasePage', $content, basename($filePath));
        Assert::assertStringNotContainsString('extends Page', $content, basename($filePath));
    }
});

test('cluster does not extend Filament directly', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $file = base_path('Modules/User/app/Filament/Clusters/Appearance.php');
    $content = (string) file_get_contents($file);

    Assert::assertStringNotContainsString('extends Cluster', $content);
    Assert::assertStringNotContainsString('use Filament\\Clusters\\Cluster;', $content);
    Assert::assertStringContainsString('extends XotBaseCluster', $content);
});

test('cluster pages are accessible', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->createOne([
        'name' => 'Cluster Test User',
        'email' => 'cluster-'.uniqid('', true).'@example.com',
    ]);

    $this->actingAs($user);

    $pages = [
        Alignment::class,
        Background::class,
        Colors::class,
        CustomCss::class,
        Favicon::class,
        Logo::class,
    ];

    foreach ($pages as $pageClass) {
        Assert::assertTrue(class_exists($pageClass));
    }
});
