@extends('manager.layout')

@section('content')
    <h1 class="mt-4 mb-4">Listado de publicaciones</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('manager.publications.create') }}" class="btn btn-primary mb-2">Nueva publicación</a>
            @if(count($publications) > 0)
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">created at</th>
                            <th scope="col" class="text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publications as $publication)
                            <tr>
                                <td>{{ $publication->title }}</td>
                                <td>{{ $publication->body }}</td>
                                <td>{{ $publication->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('manager.publications.show', [
                                            'id' => $publication->id
                                        ]) }}" 
                                        class="btn btn-secondary btn-sm btn-block mb-2">
                                        show
                                    </a>
                                    <a href="{{ route('manager.publications.edit', [
                                            'id' => $publication->id
                                        ]) }}" 
                                        class="btn btn-primary btn-sm btn-block mb-2">
                                        edit
                                    </a>
                                    <form action="{{ route('manager.publications.delete', [
                                            'id' => $publication->id
                                        ]) }}" method="POST">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $publications->links() }}
            @else
                <div class="alert alert-primary" role="alert">
                    No Publications found.
                </div>
            @endif
        </div>
    </div>
@endsection