@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Listado de usuarios</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('manager.users.create') }}" class="btn btn-primary mb-2">Nuevo usuario</a>
            @if(count($users) > 0)
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('manager.users.edit', [
                                            'id' => $user->id
                                        ]) }}" 
                                        class="btn btn-primary btn-sm mb-2">
                                        edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <div class="alert alert-primary" role="alert">
                    No users found.
                </div>
            @endif
        </div>
    </div>
@endsection