<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'language'
    ];

    public function adress(){
        return $this->hasOne(Adress::class,'student_id','id');
    }
}
