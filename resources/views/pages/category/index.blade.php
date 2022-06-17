@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('category.create') }}" class="btn btn-primary float-right">
                Create
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategory</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($categories as  $category)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->kategori }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                                <form
                                    action="{{ route('category.destroy', $category->id) }}"
                                    class="d-inline"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure ?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
