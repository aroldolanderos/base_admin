@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Listado de permisos</h1>
    <div class="row">
        <div class="col-md-12">
            @if(count($permissions) > 0)
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col" class="text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('manager.users.edit', [
                                            'id' => $permission->id
                                        ]) }}" 
                                        class="btn btn-primary btn-sm mb-2">
                                        edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $permissions->links() }}
            @else
                <div class="alert alert-primary" role="alert">
                    No permissions found.
                </div>
            @endif
        </div>
    </div>
@endsection