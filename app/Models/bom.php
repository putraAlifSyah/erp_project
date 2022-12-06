<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bom extends Model
{
    protected $primaryKey = 'id_materiak';
    // protected $fillable = ['kode_order', 'nama_customer', 'alamat', 'kontak', 'id_produk', 'tanggal_order', 'durasi_pengerjaan'];
    protected $guarded = ['id_materiak', 'created_at', 'updated_at'];
    
}
