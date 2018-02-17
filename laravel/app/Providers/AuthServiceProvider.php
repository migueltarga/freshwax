<?php

namespace freshwax\Providers;

use freshwax\Models\User;
use freshwax\Policies\UserPolicy;

use freshwax\Models\Track;
use freshwax\Policies\TrackPolicy;

use freshwax\Models\Artist;
use freshwax\Policies\ArtistPolicy;

use freshwax\Models\Album;
use freshwax\Policies\AlbumPolicy;

use freshwax\Models\Label;
use freshwax\Policies\LabelPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
		User::class => UserPolicy::class,
		Track::class => TrackPolicy::class,
		Artist::class => ArtistPolicy::class,
		Album::class => AlbumPolicy::class,
		Label::class => LabelPolicy::class
    ];


    public function boot()
	{
        $this->registerPolicies();
    }
}
