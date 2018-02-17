<?php

namespace freshwax\Providers;

use freshwax\Models\Track;
use freshwax\Policies\TrackPolicy;

use freshwax\Models\Artist;
use freshwax\Policies\ArtistPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
		Track::class => TrackPolicy::class,
		Artist::class => ArtistPolicy::class
    ];


    public function boot()
	{
        $this->registerPolicies();
    }
}
