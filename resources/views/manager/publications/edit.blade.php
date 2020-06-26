@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Editar Publicación</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('manager.publications.update', ['id' => $publication->id]) }}" method="POST" accept-charset="utf-8">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $publication->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Descripción</label>
                    <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror">{{ $publication->title }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection