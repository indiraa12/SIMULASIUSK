<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbkasir';
    protected $primaryKey = 'idkasir';
    protected $guarded = [];
}
