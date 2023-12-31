<?php

namespace App\Policies;

use App\Product_cat;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCatPolicy
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
     * @param  \App\Product_cat  $productCat
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.list-productcat'));
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
        return $user->checkPermissionAccess(config('permissions.access.add-productcat'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product_cat  $productCat
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.edit-productcat'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product_cat  $productCat
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.delete-productcat'));
    }

 
    public function act(User $user)
    {
        //
        return $user->checkPermissionAccess(config('permissions.access.act-productcat'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product_cat  $productCat
     * @return mixed
     */
    public function restore(User $user, Product_cat $productCat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product_cat  $productCat
     * @return mixed
     */
    public function forceDelete(User $user, Product_cat $productCat)
    {
        //
    }
}
