<?php

namespace freshwax\Policies;

use freshwax\Models\User;
use freshwax\Models\Track;

use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

	public function before($user, $ability)
	{
		if ($user->isadmin) {
			return true;
		}
	}

    /**
     * Determine whether the user can view the track.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Track  $track
     * @return mixed
     */
    public function view(User $user, Track $track)
    {
		return true;
	}

    /**
     * Determine whether the user can create tracks.
     *
     * @param  \freshwax\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasArtists();
    }

    /**
     * Determine whether the user can update the track.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Track  $track
     * @return mixed
     */
    public function update(User $user, Track $track)
	{
		return $track->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the track.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Track  $track
     * @return mixed
     */
    public function delete(User $user, Track $track)
    {
		return $track->user_id === $user->id;
   	}
}
