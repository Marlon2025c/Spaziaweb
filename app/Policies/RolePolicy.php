<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function isAdmin(User $user)
    {
        return $user->id_role === 1; // 1 = Admin
    }
}
