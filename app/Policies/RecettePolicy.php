<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Recette;
use App\Models\User;

class RecettePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function before(User $user, string $ability): bool|null {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return null;
    }

    function update(User $user, Recette $recette) {
        return $user->id === $recette->user_id;
    }

    function delete(User $user) {
        return $user->role === Role::ADMIN;
    }

    function create(User $user) {
        return $user->role === Role::USER;
    }
}
