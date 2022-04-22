<?php

namespace App\Providers;

use App\Models\Component;
use App\Models\Farm;
use App\Models\Turbine;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Farm::creating(function ($c) {
            $c->uuid = substr(Str::uuid(), 0, 8);
        });
        Turbine::creating(function ($c) {
            $c->uuid = substr(Str::uuid(), 0, 8);
        });
        Component::creating(function ($c) {
            $c->slug = Str::slug($c->name);
        });
    }
}
