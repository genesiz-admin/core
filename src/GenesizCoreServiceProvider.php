<?php

namespace Genesizadmin\GenesizCore;

use Genesizadmin\GenesizCore\Commands\GenesizCoreCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GenesizCoreServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('genesiz-core')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_genesiz-core_table')
            ->hasCommand(GenesizCoreCommand::class);
    }
}
