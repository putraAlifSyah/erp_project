<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfq extends Model
{
    
    protected $primaryKey = 'id_rfq';
    protected $guarded = ['id_rfq', 'created_at', 'updated_at'];
    
    public function Panggilvendor(){
        return $this->belongsTo('App\Models\vendor','id_vendor')->withDefault([
            'id_vendor'=>'tidak ada'
        ]);    
    }
    public function Panggil_nama_bahan(){
        return $this->belongsTo('App\Models\bahan','id')->withDefault([
            'id_bahan'=>'tidak ada'
        ]);    
    }
    public function Panggil_harga_satuan(){
        return $this->belongsTo('App\Models\bahan','id')->withDefault([
            'id_bahan_2'=>'tidak ada'
        ]);    
    }
}
