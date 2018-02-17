<?php

namespace freshwax\Policies;

use freshwax\Models\User;
use freshwax\Models\Artist;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;

	public function before($user, $ability)
	{
		if ($user->isadmin) {
			return true;
		}
	}

	/**
     * Determine whether the user can view the artist.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Artist  $artist
     * @return mixed
     */
    public function view(User $user, Artist $artist)
    {
        return true;
    }

    /**
     * Determine whether the user can create artists.
     *
     * @param  \freshwax\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the artist.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Artist  $artist
     * @return mixed
     */
    public function update(User $user, Artist $artist)
    {
        return $artist->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the artist.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Artist  $artist
     * @return mixed
     */
    public function delete(User $user, Artist $artist)
    {
        return $artist->user_id === $user->id;
    }
}
