<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Clusters;

use Modules\User\Database\Factories\UserFactory;
use Modules\User\Filament\Clusters\Appearance;
use Modules\User\Filament\Clusters\Appearance\Pages\Alignment;
use Modules\User\Filament\Clusters\Appearance\Pages\Background;
use Modules\User\Filament\Clusters\Appearance\Pages\Colors;
use Modules\User\Filament\Clusters\Appearance\Pages\CustomCss;
use Modules\User\Filament\Clusters\Appearance\Pages\Favicon;
use Modules\User\Filament\Clusters\Appearance\Pages\Logo;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Clusters\XotBaseCluster;
use Modules\Xot\Filament\Pages\XotBasePage;
use ReflectionClass;

use function Safe\file_get_contents;
use function Safe\glob;

class AppearanceClusterTest extends TestCase
{
    public function test_appearance_cluster_extends_xot_base_cluster(): void
    {
        $this->assertSame(XotBaseCluster::class, get_parent_class(Appearance::class));
    }

    public function test_all_cluster_pages_extend_xot_base_page(): void
    {
        $pages = [
            Alignment::class,
            Background::class,
            Colors::class,
            CustomCss::class,
            Favicon::class,
            Logo::class,
        ];

        foreach ($pages as $pageClass) {
            $this->assertSame(XotBasePage::class, get_parent_class($pageClass));
        }
    }

    public function test_all_cluster_pages_have_cluster_property_set(): void
    {
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

            $this->assertSame(Appearance::class, $defaultValue);
        }
    }

    public function test_cluster_pages_do_not_extend_filament_classes_directly(): void
    {
        $files = glob(base_path('Modules/User/app/Filament/Clusters/Appearance/Pages/*.php'));

        if ([] === $files) {
            $this->markTestSkipped('Appearance cluster pages directory not found.');
        }

        foreach ($files as $file) {
            $filePath = (string) $file;
            $content = (string) file_get_contents($filePath);
            $this->assertStringContainsString('extends XotBasePage', $content, basename($filePath));
            $this->assertStringNotContainsString('extends Page', $content, basename($filePath));
        }
    }

    public function test_cluster_does_not_extend_filament_directly(): void
    {
        $file = base_path('Modules/User/app/Filament/Clusters/Appearance.php');
        $content = (string) file_get_contents($file);

        $this->assertStringNotContainsString('extends Cluster', $content);
        $this->assertStringNotContainsString('use Filament\\Clusters\\Cluster;', $content);
        $this->assertStringContainsString('extends XotBaseCluster', $content);
    }

    public function test_cluster_pages_are_accessible(): void
    {
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
            $this->assertTrue(class_exists($pageClass));
        }
    }
}
