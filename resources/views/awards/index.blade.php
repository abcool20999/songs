@extends('layouts/admin')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">View all Awards</h1>
        </div>
    </div>
    <div class="row">
        @foreach($awards as $award)
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $award->artist }} {{ $award->billboardAwards }} {{ $award->grammyAwards}}</h5>
                        <a href="{{ route('awards.edit', $award->id) }}" class="card-link">Edit</a>
                        <a href="{{ route('awards.trash', $award->id) }}" class="card-link">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
