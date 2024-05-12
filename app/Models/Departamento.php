<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function adress(){
        return $this->belongsTo(Adress::class,'adress_id','id');
    }
}
