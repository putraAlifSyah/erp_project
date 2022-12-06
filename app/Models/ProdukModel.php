<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $primaryKey = 'id_produk';
    protected $fillable =['kode_produk', 'nama_produk', 'keterangan_produk'];

    // public function bahans(){
    // 	return $this->hasMany('App\Models\bahan');
    // }
}
