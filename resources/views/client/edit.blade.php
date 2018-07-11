@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ action('ClientController@index') }}">
                                {{ __('Manage Clients') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ action('ClientController@show', $client) }}">
                                {{ __('app.client', ['id' => $client->id, 'name' => $client->name]) }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('Edit Client') }}
                        </li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">{{ __('Edit Client') }}: {{ __('app.client', ['id' => $client->id, 'name' => $client->name]) }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('ClientController@update', $client) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $client->name }}" required>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
