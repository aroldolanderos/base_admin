@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Listado de roles</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('manager.roles.create') }}" class="btn btn-primary mb-2">Nuevo rol</a>
            @if(count($roles) > 0)
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col" class="text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('manager.roles.edit', [
                                            'id' => $role->id
                                        ]) }}" 
                                        class="btn btn-primary btn-sm mb-2">
                                        manager permissions
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $roles->links() }}
            @else
                <div class="alert alert-primary" role="alert">
                    No roles found.
                </div>
            @endif
        </div>
    </div>
@endsection