<?php

namespace App\Policies;

use App\Commerce;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommercePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateCommerce(User $user, Commerce $commerce)
    {
        return $user->id === $commerce->user_id;
    }
}
