@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Editar Rol</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('manager.roles.update', ['id' => $role->id]) }}" method="POST" accept-charset="utf-8">
                @csrf
                @method('put')
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input"
                            type="checkbox"
                            name="permisions[]"
                            value="{{ $permission->id }}"
                            id="defaultCheck-{{ $permission->id }}"
                            @if(in_array($permission->id, $currentPermissionsIds))checked @endif>
                        <label class="form-check-label" for="defaultCheck-{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-3">Enviar</button>
            </form>
        </div>
    </div>
@endsection