@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">{{ $publication->title }}n</h1>
    <div class="row">
        <div class="col-md-6">
            <p>
                {{ $publication->body }}
            </p>
        </div>
    </div>
@endsection