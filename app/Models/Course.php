<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    //Relacion uno a muchos
    public function assignament(){
        return $this->hasMany(Assignament::class);
    }

    public function exercise()
    {
        return $this->hasMany(exercise::class);
    }
}
