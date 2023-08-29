<?php

namespace Hasnayeen\BladeSsg;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Hasnayeen\BladeSsg\Commands\BladeSsgCommand;
use Hasnayeen\BladeSsg\Testing\TestsBladeSsg;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeSsgServiceProvider extends PackageServiceProvider
{
    public static string $name = 'blade-ssg';

    public static string $viewNamespace = 'blade-ssg';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('hasnayeen/blade-ssg');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
            $package->hasViewComponents(static::$viewNamespace, ...$this->getViewComponents());
        }

        if (file_exists($package->basePath('/../routes'))) {
            $package->hasRoutes($this->getRoutes());
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/blade-ssg/{$file->getFilename()}"),
                ], 'blade-ssg-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsBladeSsg());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'hasnayeen/blade-ssg';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('blade-ssg', __DIR__ . '/../resources/dist/components/blade-ssg.js'),
            Css::make('styles', __DIR__ . '/../resources/dist/blade-ssg.css'),
            Js::make('scripts', __DIR__ . '/../resources/dist/blade-ssg.js'),
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function getViewComponents(): array
    {
        return [
            'docs.layout' => 'blade-ssg::docs.layout',
            'docs.left-sidebar' => 'blade-ssg::docs.left-sidebar',
            'docs.navbar' => 'blade-ssg::docs.navbar',
            'docs.right-sidebar' => 'blade-ssg::docs.right-sidebar',
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            BladeSsgCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [
            'web',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_blade_ssg_tables',
        ];
    }
}
