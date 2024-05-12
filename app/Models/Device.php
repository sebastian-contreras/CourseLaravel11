<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class,"student_id","id");
    }
    public function accounts(){
        return $this->hasMany(DeviceAccount::class,"device_id","id");
    }


}
