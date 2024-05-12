<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function departamento(){
        return $this->hasOne(Departamento::class,'adress_id','id');
    }
}
