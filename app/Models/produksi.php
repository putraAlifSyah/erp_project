<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    protected $primaryKey = 'id_produksi';
    protected $guarded = ['id_produksi', 'created_at', 'updated_at'];
}
