@extends('layouts.admin')

@section('title')
    Category Edit
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
                <form action="{{ route('transaction.update',$item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <input type="date" name="tanggal" class="form-control" value="{{$item->tanggal}}">

                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" class="form-control" >
                            <option value="">--Pilih Jenis--</option>
                            <option <?php if($item->jenis == "Pemasukan"){echo "selected='selected'";} ?> value="Pemasukan">Pemasukan</option>
                            <option <?php if($item->jenis == "Pengeluaran"){echo "selected='selected'";} ?> value="Pengeluaran">Pengeluaran</option>
                        </select>
                        @if($errors->has('jenis'))
                            <span class="text-danger">
                            <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" id="" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            @foreach ($categories as $category)
                                <option <?php if($category->id == $category->kategori_id){
                                    echo "selected='selected'"; } ?> value="{{$category->id}}">{{$category->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" name="nominal" class="form-control" value="{{ $item->nominal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" class="form-control">{{$item->keterangan}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
