<?php

namespace App\Policies;

use App\User;
use App\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Only superusers can manage clients.
     *
     * @param \App\User $user
     * @return bool
     */
    public function manage(User $user)
    {
        return $user->superuser == true;
    }

    /**
     * Users cannot delete the client they are attached to.
     *
     * @param \App\User   $user
     * @param \App\Client $client
     * @return bool
     */
    public function delete(User $user, Client $client)
    {
        return $user->client_id !== $client->id;
    }
}
