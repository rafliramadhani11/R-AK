<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function userDashboard(User $user): Response
    {
        return $user->admin === 0
                ? Response::allow()
                : Response::deny('Kamu dilarang mengakses ini !');
    }

    public function adminDashboard(User $user): Response
    {
        return $user->admin === 1
            ? Response::allow()
            : Response::deny('HANYA ADMIN YANG DIPERBOLEHKAN !');
    }
}
