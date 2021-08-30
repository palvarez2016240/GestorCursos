<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercise extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'course_id'];

    //Relacion uno a muchos inversa
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    //Relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
