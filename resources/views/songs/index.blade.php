@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">View all Songs</h1>
        </div>
    </div>
    <div class="row">
        @foreach($songs as $song)
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $song->title }} {{ $song->artist }} {{ $song->releaseDate }}</h5>
                        <a href="{{ route('songs.edit', $song->id) }}" class="card-link">Edit</a>
                        <a href="{{ route('songs.trash', $song->id) }}" class="card-link">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
