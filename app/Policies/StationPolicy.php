<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Station;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any stations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the station.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function view(User $user, Station $station)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create stations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the station.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function update(User $user, Station $station)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the type of the station.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function updateType(User $user, Station $station)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the station.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function delete(User $user, Station $station)
    {
        return $user->isAdmin();
    }
}
