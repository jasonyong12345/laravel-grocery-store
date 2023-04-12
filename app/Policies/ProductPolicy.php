<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can add a product.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function add(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete a product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Product  $product
     * @return bool
     */
    public function delete(User $user, Product $product)
    {
        return $user->role === 'admin';
    }
}




