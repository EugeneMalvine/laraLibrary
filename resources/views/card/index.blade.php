@extends('base')

@section('content')
    <div class="container mt-2">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sorting
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('card.self', ['sortBy' => 'rating']) }}">Rating</a>
                <a class="dropdown-item" href="{{ route('card.self', ['sortBy' => 'title']) }}">Title</a>
                <a class="dropdown-item" href="{{ route('card.self', ['sortBy' => 'dateStart']) }}">Date</a>
            </div>
            <a href="{{ route('card.create') }}" type="button" class="btn btn-success">Create Card</a>
        </div>
        <br>
        <div class="row">
            @forelse($cards as $card)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            <p class="card-text">{{ $card->dateStart->format('d.m.Y') }} - {{ $card->dateFinish?->format('d.m.Y') ?? 'pr. time' }}</p>
                            <a href="{{ route('card.edit.form', ['card' => $card]) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Pls, create card</p>
            @endforelse
        </div>
        {{ $cards->appends(Request::all())->links() }}
    </div>
@endsection