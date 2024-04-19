@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">Add a Song</h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('songs.store') }}" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">artist</label>
                <input type="text" class="form-control" id="artist" name="artist" aria-describedby="artist">
            </div>
            <div class="mb-3">
                <label for="releaseDate" class="form-label">releaseDate</label>
                <input type="releaseDate" class="form-control" id="releaseDate" name="releaseDate" aria-describedby="releaseDate">
                @error('releaseDate')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
