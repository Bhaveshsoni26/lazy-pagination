<?php

namespace YourVendor\LazyPagination;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LazyPaginationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lazy-pagination');
        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/lazy-pagination'),
        ], 'lazy-pagination-views');

        Livewire::component('lazy-pagination', \YourVendor\LazyPagination\Http\Livewire\LazyPagination::class);
    }

    public function register()
    {
        //
    }
} 