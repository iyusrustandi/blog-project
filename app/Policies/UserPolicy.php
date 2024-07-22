<?php

// app/Policies/UserPolicy.php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // Tambahkan logika otorisasi Anda di sini
        return $user->role === 'admin'; 
    }

    /**
     * Determine whether the user can access the dashboard.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function accessDashboard(User $user)
    {
        return in_array($user->role, ['author', 'admin']);
    }
}
