<?php

namespace freshwax\Providers;

use freshwax\Models\Track;
use freshwax\Policies\TrackPolicy;

use freshwax\Models\Artist;
use freshwax\Policies\ArtistPolicy;

use freshwax\Models\Album;
use freshwax\Policies\AlbumPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
		Track::class => TrackPolicy::class,
		Artist::class => ArtistPolicy::class,
		Album::class => AlbumPolicy::class
    ];


    public function boot()
	{
        $this->registerPolicies();
    }
}
