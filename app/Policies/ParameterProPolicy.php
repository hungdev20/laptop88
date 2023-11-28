<?php

namespace App\Policies;

use App\Parameter_pro;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParameterProPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Parameter_pro  $parameterPro
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.list-parameterpro'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.add-parameterpro'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Parameter_pro  $parameterPro
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.edit-parameterpro'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Parameter_pro  $parameterPro
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.delete-parameterpro'));
    }
    public function act(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.act-parameterpro'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Parameter_pro  $parameterPro
     * @return mixed
     */
    public function restore(User $user, Parameter_pro $parameterPro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Parameter_pro  $parameterPro
     * @return mixed
     */
    public function forceDelete(User $user, Parameter_pro $parameterPro)
    {
        //
    }
}
