<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    protected $fillable = ['id_produk', 'nama_bahan', 'value', 'satuan', 'harga', 'vendor'];

    public function produks(){
        return $this->belongsTo('App\Models\produk','id_produk')->withDefault([
            'id_produk'=>'tidak ada'
        ]);    
    }
}
