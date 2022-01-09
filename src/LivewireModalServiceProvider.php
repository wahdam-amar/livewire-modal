<?php

namespace Wahdam\LivewireModal;

use Illuminate\Support\ServiceProvider;

class LivewireModalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-modal');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
