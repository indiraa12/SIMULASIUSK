@extends('layouts/main')
@section('konten')
<div class="card">
    <div class="card-body">
      <p class="text-uppercase text-sm">EDIT DATA</p>
      @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif
      <div class="row">
        <div class="col-md-6">
            <form action="{{ route('barang.update', $barang->idbarang) }}" method="POST">
                @method('put')
                @csrf
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Nama Barang</label>
            <input class="form-control" type="text" name="namabarang"  value="{{ $barang->namabarang }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Harga Barang</label>
            <input class="form-control" type="number" name="hargabarang"  value="{{ $barang->hargabarang }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Stok</label>
            <input class="form-control" type="number" name="stok" value="{{ $barang->stok }}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
      </div>
    </div>
  </div>
@endsection