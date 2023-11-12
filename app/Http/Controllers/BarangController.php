<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtbarang = Barang::all();
        return view('barang.index', compact('dtbarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namabarang' => 'required',
            'hargabarang' => 'required',
            'stok' => 'required|integer|min:0', // Validasi stok tidak boleh negatif
        ]);

        // Validasi stok agar tidak menjadi negatif
        if ($request->input('stok') < 0) {
            return redirect()->back()->with('error', 'Stok barang tidak boleh negatif.');
        }

        Barang::create($request->all());
        return redirect('barang');
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
    public function edit(Request $request, Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'namabarang' => 'required',
            'hargabarang' => 'required',
            'stok' => 'required|integer|min:0', // Validasi stok tidak boleh negatif
        ]);

        // Validasi stok agar tidak menjadi negatif
        if ($request->input('stok') < 0) {
            return redirect()->back()->with('error', 'Stok barang tidak boleh negatif.');
        }

        $barang->update($request->all());
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Barang $barang)
    {
        $barang->delete();
        return redirect('barang');
    }
}
