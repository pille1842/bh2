<?php

namespace App\Repositories;

use App\User;
use App\Client;

class UserRepository
{
    /**
     * Return all users.
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Return all users belonging to a client.
     *
     * @param  \App\Client  $client
     * @return mixed
     */
    public function client(Client $client)
    {
        return User::where('client_id', $client->id)->get();
    }
}
