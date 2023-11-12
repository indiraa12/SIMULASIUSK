<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kasir;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kasir = Kasir::all();
        $barang = Barang::all();
        return view('transaksi.create', compact('barang', 'kasir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::find($request->input('idbarang'));
        $qty = $request->input('qty');

        if ($qty < 0) {
            return redirect()->back()->with('error', 'QTY tidak boleh negatif.');
        }

        if ($barang->stok < $qty) {
            return redirect()->back()->with('error', 'Stok tidak cukup');
        }

        $totalbayar = $barang->hargabarang * $qty;

        Transaksi::create([
            'idkasir' => auth()->user()->idkasir,
            'idbarang' => $request->input('idbarang'),
            'qty' => $qty,
            'totalbayar' => $totalbayar,
            'tgltransaksi' => now(),
        ]);

        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Transaksi $transaksi)
    {
        $kasir = Kasir::all();
        $barang = Barang::all();
        return view('transaksi.edit', compact('kasir', 'barang', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'qty' => 'required|integer|min:0', // Validasi qty tidak boleh negatif
        ]);

        // Dapatkan informasi barang yang akan diupdate
        $barang = $transaksi->barang;

        // Validasi stok agar tidak menjadi negatif setelah pembaruan
        if ($barang->stok + $transaksi->qty - $request->input('qty') < 0) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        // Proses pembaruan transaksi
        $transaksi->update([
            'qty' => $request->input('qty'),
            'totalbayar' => $barang->hargabarang * $request->input('qty'),
        ]);

        // Update stok barang
        $barang->update([
            'stok' => $barang->stok + $transaksi->qty - $request->input('qty'),
        ]);

        return redirect('transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('transaksi');
    }
}
