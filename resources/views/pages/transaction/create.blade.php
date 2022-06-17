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
                <form action="{{ route('transaction.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" class="form-control">
                            <option value="">--Pilih Jenis--</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" id="" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($categories as $c)
                                <option value="{{$c->id}}">{{$c->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" name="nominal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                       <textarea name="keterangan" class="form-control"></textarea>
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
