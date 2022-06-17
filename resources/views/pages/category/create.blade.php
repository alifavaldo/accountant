@extends('layouts.admin')

@section('title')
    Category Create
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="kategori" name="kategori" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">
                                Save Now
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@push('addon-script')
    <script>
        function store()
        {
            var kategori = $('#kategori').val();
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "data",
                dataType: "dataType",
                success: function (response) {

                }
            });
        }
    </script>
@endpush
