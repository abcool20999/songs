@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">Update Award</h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('awards.update', $award->id) }}" method="POST">
            @method('PUT')
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">artist</label>
                <input type="text" class="form-control" id="artist" name="artist" aria-describedby="artist" value="{{ $award->artist }}">
            </div>
            <div class="mb-3">
                <label for="billboardAwards" class="form-label">billboardAwards</label>
                <input type="text" class="form-control" id="billboardAwards" name="billboardAwards" aria-describedby="billboardAwards" value="{{ $award->billboardAwards }}">
            </div>
            <div class="mb-3">
                <label for="grammyAwards" class="form-label">grammyAwards</label>
                <input type="text" class="form-control" id="grammyAwards" name="grammyAwards" aria-describedby="grammyAwards" value="{{ $award->grammyAwards }}">
                @error('grammyAwards')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
