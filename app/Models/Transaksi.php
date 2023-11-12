<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tbtransaksi';
    protected $primaryKey = 'idtransaksi';
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'idkasir');
    }
}
