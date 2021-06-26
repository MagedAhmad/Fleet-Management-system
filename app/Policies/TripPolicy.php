<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Trip;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any trips.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the trip.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Trip $trip
     * @return mixed
     */
    public function view(User $user, Trip $trip)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create trips.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the trip.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Trip $trip
     * @return mixed
     */
    public function update(User $user, Trip $trip)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the type of the trip.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Trip $trip
     * @return mixed
     */
    public function updateType(User $user, Trip $trip)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the trip.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Trip $trip
     * @return mixed
     */
    public function delete(User $user, Trip $trip)
    {
        return $user->isAdmin();
    }
}
