<?php

namespace App\Policies;

use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\UserModel  $user
     * @return mixed
     */
    public function viewAny(UserModel $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\UserModel  $user
     * @param  \App\Models\OrderModel  $orderModel
     * @return mixed
     */
    public function view(UserModel $user, OrderModel $orderModel)
    {
        //user must have permission crud-order first
        //then check user_id === order->user_id
        //may be no need create permission crud-order (and table permission)
        //only need 1 table that roles cause this app have a simple authorization
        //but in case if my app have many permission...
        return $user->can('crud-order') && $user->id === $orderModel->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\UserModel  $user
     * @return mixed
     */
    public function create(UserModel $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\UserModel  $user
     * @param  \App\Models\OrderModel  $orderModel
     * @return mixed
     */
    public function update(UserModel $user, OrderModel $orderModel)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserModel  $user
     * @param  \App\Models\OrderModel  $orderModel
     * @return mixed
     */
    public function delete(UserModel $user, OrderModel $orderModel)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserModel  $user
     * @param  \App\Models\OrderModel  $orderModel
     * @return mixed
     */
    public function restore(UserModel $user, OrderModel $orderModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserModel  $user
     * @param  \App\Models\OrderModel  $orderModel
     * @return mixed
     */
    public function forceDelete(UserModel $user, OrderModel $orderModel)
    {
        //
    }
}
