<?php

namespace freshwax\Policies;

use freshwax\Models\User;
use freshwax\Models\Album;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the album.php.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Album.php  $album.php
     * @return mixed
     */
    public function view(User $user, Album $album)
    {
        return true;//todo: handle release date?
    }

    /**
     * Determine whether the user can create album.phps.
     *
     * @param  \freshwax\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasArtists();
    }

    /**
     * Determine whether the user can update the album.php.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Album.php  $album.php
     * @return mixed
     */
    public function update(User $user, Album $album)
    {
        return $album->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the album.php.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \Models\Album.php  $album.php
     * @return mixed
     */
    public function delete(User $user, Album $album)
    {
        return $album->user_id === $user->id;
    }
}
