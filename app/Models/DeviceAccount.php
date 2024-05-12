<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceAccount extends Model
{
    use HasFactory;
    public function device(){
        return $this->belongsTo(Device::class,'device_id','id');
    }
}
