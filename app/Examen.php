<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    //método que hace referencia a el modelo Examen para indicar su pertenecia 
    public function exa(){
        return $this->belongsTo(Examen::class,'id_examen');
    }
}
