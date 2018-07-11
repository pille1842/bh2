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
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('app.client', ['id' => $client->id, 'name' => $client->name]) }}
                        </li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('app.client', ['id' => $client->id, 'name' => $client->name]) }}
                        <div class="float-right">
                            <form method="POST" action="{{ action('ClientController@destroy', $client) }}">
                                @csrf

                                @method('DELETE')

                                <a href="{{ action('ClientController@edit', $client) }}" class="btn btn-secondary">
                                    {{ __('Edit') }}
                                </a>

                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('{{ __('Do you really want to delete this client and all its data?') }}')"{!! ! Auth::user()->can('delete', $client) ? ' disabled data-toggle="tooltip" title="' . __('You cannot delete the client your account is attached to.') . '"' : '' !!}>
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach ($users as $user)
                            <li class="list-group-item{{ $user->superuser ? ' list-group-item-primary' : '' }}{{ $user->manager && ! $user->superuser ? ' list-group-item-secondary' : '' }} d-flex justify-content-between align-items-center">
                                <span>
                                    #{{ $user->id }}: {{ $user->name }}
                                    &lt;<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>&gt;
                                    @if ($user->superuser)
                                        <span class="badge badge-primary">{{ __('Superuser') }}</span>
                                    @endif
                                    @if ($user->manager)
                                        <span class="badge badge-secondary">{{ __('Manager') }}</span>
                                    @endif
                                </span>
                                <div class="float-right">
                                    <form method="POST" action="">
                                        @csrf

                                        @method('DELETE')

                                        <a href="#" class="btn btn-xs btn-secondary">
                                            {{ __('Edit') }}
                                        </a>

                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('{{ __('Do you really want to delete this user?') }}')"{!! Auth::user()->id === $user->id ? ' disabled data-toggle="tooltip" title="' . __('You cannot delete your own account.') . '"' : '' !!}>
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
