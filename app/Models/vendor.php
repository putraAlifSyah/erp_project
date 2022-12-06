<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $primaryKey = 'id_vendor';
    protected $guarded = ['id_vendor', 'created_at', 'updated_at'];
    
    
}
