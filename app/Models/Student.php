<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Finder\Exception\AccessDeniedException;

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

    public function adress()
    {
        return $this->hasOne(Adress::class, 'student_id', 'id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class, 'student_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')->withTimestamps();
    }

    public function departamento()
    {
        return $this->hasOneThrough(Departamento::class, Adress::class, 'student_id', 'adress_id');
            // primer argunmento refiere a la entidad que quiero acceder
            // segundo argumento refiere desde que entidad se accede
            // tercer argumento refiere a la llave foranea asociada a la entidad student por donde se accede a Adress
            // cuarto argumento refiere a la llave desde donde accede departamento y adress

    }

    public function accounts(){
        return $this->hasManyThrough(DeviceAccount::class, Device::class,'student_id','device_id');
    }
}
