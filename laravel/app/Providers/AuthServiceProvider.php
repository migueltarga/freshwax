<?php

namespace Freshwax\Providers;

use Freshwax\Track;
use Freshwax\Policies\TrackPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Track::class => TrackPolicy::class,
    ];


    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    }
}
