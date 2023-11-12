@extends('layouts/main')
@section('konten')
<div class="card">
    <div class="card-body">
      <p class="text-uppercase text-sm">TAMBAH DATA</p>
      @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif

      <div class="row">
        <div class="col-md-6">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Nama Barang</label>
            <input class="form-control" type="text" name="namabarang"  placeholder="namabarang">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Harga Barang</label>
            <input class="form-control" type="number" name="hargabarang"  placeholder="hargabarang">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Stok</label>
            <input class="form-control" type="number" name="stok" placeholder="stok">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
      </div>
    </div>
  </div>
@endsection