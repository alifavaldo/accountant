@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('transaction.create') }}" class="btn btn-primary float-right">
                Create
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="2" width="11%">Tanggal</th>
                        <th class="text-center" rowspan="2" width="5%">Jenis</th>
                        <th class="text-center" rowspan="2">Keterangan</th>
                        <th class="text-center" rowspan="2">Kategori</th>
                        <th class="text-center" colspan="2">Transaksi</th>
                        <th class="text-center" rowspan="2" width="13%">Opsi</th>
                    </tr>
                    <tr>
                        <th class="text-center">Pemasukan</th>
                        <th class="text-center">Pengeluaran</th>
                    </tr>
                </thead>
                @foreach ($transactions as $transaction)
                <tr>
                    <td class="text-center">{{date('d-m-Y',strtotime($transaction->tanggal))}}</td>
                    <td class="text-center">{{$transaction->jenis}}</td>
                    <td class="text-center">{{$transaction->keterangan}}</td>
                    <td class="text-center">{{$transaction->kategori->kategori}}</td>
                <td class="text-center">
                    @if ($transaction->jenis == "Pemasukan")
                        {{ "Rp.".number_format($transaction->nominal).",-" }}
                        @else
                        -
                    @endif
                </td>
                <td class="text-center">
                    @if ($transaction->jenis == "Pengeluaran")
                    {{ "Rp.".number_format($transaction->nominal).",-" }}
                    @else
                    -
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('transaction.edit', $transaction->id) }}"><i class="fas fa-edit"></i></a>
                    <form
                        action="{{ route('transaction.destroy', $transaction->id) }}"
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
            @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
