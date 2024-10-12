<?php

namespace MoonShine\EasyMde\Tests;

use MoonShine\EasyMde\Providers\EasyMdeServiceProvider;
use MoonShine\Laravel\Providers\MoonShineServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            MoonShineServiceProvider::class,
            EasyMdeServiceProvider::class,
        ];
    }
}
