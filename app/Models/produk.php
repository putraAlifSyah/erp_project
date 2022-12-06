<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $primaryKey = 'id_produk';
    protected $fillable =['kode_produk', 'nama_produk', 'harga', 'keterangan_produk'];
}
