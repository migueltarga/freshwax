<?php

namespace freshwax\Policies;

use freshwax\Models\User;
use freshwax\Models\Label;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the label.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Label  $label
     * @return mixed
     */
    public function view(User $user, Label $label)
    {
        return true;
    }

    /**
     * Determine whether the user can create labels.
     *
     * @param  \freshwax\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the label.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Label  $label
     * @return mixed
     */
    public function update(User $user, Label $label)
    {
        return $label->hasUser($user);
    }

    /**
     * Determine whether the user can delete the label.
     *
     * @param  \freshwax\Models\User  $user
     * @param  \freshwax\Models\Label  $label
     * @return mixed
     */
    public function delete(User $user, Label $label)
    {
        return $label->hasUser($user);
    }
}
