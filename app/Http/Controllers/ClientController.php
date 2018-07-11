<?php

namespace App\Http\Controllers;

use App\Client;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Repositories\ClientRepository  $repo
     * @return \Illuminate\Http\Response
     */
    public function index(ClientRepository $repo)
    {
        $clients = $repo->all();

        return view('client.index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $client = Client::create($request->only('name'));

        return redirect()->action('ClientController@show', $client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @param  \App\Repositories\UserRepository  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, UserRepository $repo)
    {
        $users = $repo->client($client);

        return view('client.show', compact('client', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $client->name = $request->name;
        $client->save();

        return redirect()->action('ClientController@show', $client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->action('ClientController@index');
    }
}
