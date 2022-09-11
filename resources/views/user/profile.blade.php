@extends('base')

@section('content')
    <div class="container mt-2">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>E-mail:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Balance:</strong> {{ $user->balance ?: 0 }}</li>
        </ul>
        <a href="{{ route('logout') }}" type="button" class="btn"> Log Out</a>
    </div>
@endsection