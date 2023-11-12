@extends('layouts/main')
@section('konten')
<div class="card mb-4">
    <div class="card-header pb-0">
      <h6>Data Transaksi</h6>
      <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+Tambah Transaksi</a>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-xxs font-weight-bolder">No</th>
              <th class="text-xxs font-weight-bolder">Nama Kasir</th>
              <th class="text-xxs font-weight-bolder">Nama Barang</th>
              <th class="text-xxs font-weight-bolder">QTY</th>
              <th class="text-xxs font-weight-bolder">Total Bayar</th>
              <th class="text-xxs font-weight-bolder">Tanggal Transaksi</th>
              <th class="text-xxs font-weight-bolder">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kasir->namakasir }}</td>
                    <td>{{ $item->barang->namabarang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->totalbayar }}</td>
                    <td>{{ $item->updated_at->translatedFormat('d, M Y') }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $item->idtransaksi) }}" class="btn btn-warning">EDIT</a>
                        <form action="{{ route('transaksi.destroy', $item->idtransaksi) }}" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection