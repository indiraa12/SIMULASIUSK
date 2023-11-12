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
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
          <div class="form-group">
            <label for="basic-url" class="form-label">Nama Kasir</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="idkasir" value="{{ auth()->user()->namakasir }}" readonly  >
            </div>
          </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Nama Barang</label>
            <select name="idbarang" id="idbarang" class="form-control">
                <option value="idbarang" selected>Pilih Barang</option>
                @foreach ($barang as $item)
                <option value="{{ $item->idbarang }}">{{ $item->namabarang }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">QTY</label>
            <input class="form-control" type="number" name="qty"  placeholder="qty">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
      </div>
    </div>
  </div>
@endsection