<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseOrder extends Model
{
    protected $primaryKey = 'id_po';
    protected $guarded = ['id_po', 'created_at', 'updated_at'];
}
