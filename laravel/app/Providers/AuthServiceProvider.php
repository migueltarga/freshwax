<?php

namespace freshwax\Providers;

use freshwax\Models\Track;
use freshwax\Policies\TrackPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Track::class => TrackPolicy::class,
    ];


    public function boot()
	{
        $this->registerPolicies();
    }
}
