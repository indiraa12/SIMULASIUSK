@extends('layouts/main')
@section('konten')
<div class="card mb-4">
    <div class="card-header pb-0">
      <h6>Data Barang</h6>
      <a href="{{ route('barang.create') }}" class="btn btn-primary">+Tambah Data</a>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-xxs font-weight-bolder">No</th>
              <th class="text-xxs font-weight-bolder">Nama Barang</th>
              <th class="text-xxs font-weight-bolder">Harga Barang</th>
              <th class="text-xxs font-weight-bolder">Stok</th>
              <th class="text-xxs font-weight-bolder">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dtbarang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namabarang }}</td>
                    <td>{{ $item->hargabarang }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $item->idbarang) }}" class="btn btn-warning">EDIT</a>
                        <form action="{{ route('barang.destroy', $item->idbarang) }}" class="d-inline" method="POST">
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