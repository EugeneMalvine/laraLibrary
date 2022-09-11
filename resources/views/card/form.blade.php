@extends('base')

@section('content')
    <div class="container mt-2">
        <h3>{{ $card ? 'Edit' : 'Create' }} Card</h3>
        <br>
        <form action="{{ $card ? route('card.edit', ['card' => $card]) : route('card.create') }}" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <input type="text" name="title" value="{{ old('title') ?? $card->title ?? '' }}" placeholder="book or some title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="date" name="dateStart" value="{{ old('dateStart') ?? $card->dateStart ?? '' }}" placeholder="when did you start">
                @error('dateStart')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="date" name="dateFinish" value="{{ old('dateFinish') ?? $card->dateFinish ?? '' }}" placeholder="when did you finish">
                @error('dateFinish')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="note" placeholder="your opinion">{{ old('note') ?? $card->note ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-check-label" for="isPrivate">Is private card? </label>
                <input type="checkbox" name="isPrivate" id="isPrivate" value="1" {{ old('isPrivate') || ($card && $card->isPrivate) ? 'checked="checked"' : '' }}>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection