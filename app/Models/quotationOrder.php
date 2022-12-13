<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotationOrder extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    
    public function PanggilCustomer(){
        return $this->belongsTo('App\Models\customer','id_customer')->withDefault([
            'id_customer'=>'tidak ada'
        ]);    
    }
    public function PanggilProduk(){
        return $this->belongsTo('App\Models\produk','id_produk')->withDefault([
            'id_produk'=>'tidak ada'
        ]);    
    }
}
