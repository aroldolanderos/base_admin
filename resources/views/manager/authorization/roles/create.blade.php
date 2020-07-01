@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Ingrese un nuevo Rol</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('manager.roles.store') }}" method="POST" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection