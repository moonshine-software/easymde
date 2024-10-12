<?php

declare(strict_types=1);

namespace MoonShine\EasyMde\Providers;

use Illuminate\Support\ServiceProvider;

final class EasyMdeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'moonshine-easymde');

        $this->publishes([
            __DIR__ . '/../../config/moonshine_easymde.php' => config_path('moonshine_easymde.php'),
        ], ['moonshine-easymde-config']);

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/moonshine_easymde.php',
            'moonshine_easymde'
        );

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/moonshine-easymde'),
        ], ['moonshine-easymde-assets', 'laravel-assets']);
    }
}
