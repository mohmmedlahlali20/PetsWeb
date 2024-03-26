@extends('Layouts.Admin')
@section('title' , 'All category')

@section('content')
<div class="container">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name Of Category</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td class="">{{ $cat->name }}</td>
                <td>{{ $cat->created_at }}</td>
                <td>
                    <form action="{{ route('category.destroy',$cat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form><br>
                    <a href="" class="btn btn-info"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"> no category exist</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $category->links() }}
</div>

@endsection