<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can manage users.
     */
    public function manageUsers(User $user)
    {
        return $user->is_administrator || $user->role->name === 'admin';
    }
}
