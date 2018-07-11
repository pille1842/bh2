<?php

namespace App\Repositories;

use App\Client;

class ClientRepository
{
    /**
     * Return all clients.
     *
     * @return mixed
     */
    public function all()
    {
        return Client::all();
    }
}
