@extends('base')

@section('content')
    <div class="container d-flex align-items-center flex-column">
        <h3>Log in</h3>
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="p-2">
                <input type="text" name="email" placeholder="email" required autofocus>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="p-2">
                <input type="password" name="password" placeholder="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="p-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection