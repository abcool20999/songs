@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">Add an Award</h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('awards.store') }}" method="post">
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
                <label for="artist" class="form-label">artist</label>
                <input type="text" class="form-control" id="artist" name="artist" aria-describedby="artist">
            </div>
            <div class="mb-3">
                <label for="grammyAwards" class="form-label">grammyAwards</label>
                <input type="text" class="form-control" id="grammyAwards" name="grammyAwards" aria-describedby="artist">
            </div>
            <div class="mb-3">
                <label for="billboardAwards" class="form-label">billboardAwards</label>
                <input type="billboardAwards" class="form-control" id="billboardAwards" name="billboardAwards" aria-describedby="billboardAwards">
                @error('billboardAwards')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
