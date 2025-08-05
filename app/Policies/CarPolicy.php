<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\RedirectResponse;

class CarPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !!$user->phone;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user, Car $car): Response
    {
        return $user?->id === $car->user_id ? Response::allow() : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, Car $car): Response
    {
        return $user?->id === $car->user_id ? Response::allow() : Response::denyWithStatus(404);
    }
}
