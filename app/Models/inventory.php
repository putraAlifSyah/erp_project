<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang', 'created_at', 'updated_at'];
}
