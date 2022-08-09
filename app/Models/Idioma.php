<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = "languages";
    //establecer la clave primaria de esa tabla
    protected $primaryKey = "language_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;
    //relacion M:M entre paises e idiomas
    public function paises(){
        //belongsToMany : parametrros
        //1- modelo a relacionar
        //2- la tabla pivote
        //3-fk del modelo actual en el pivote
        //4fk del modelo a relacionar en el pivote
        return $this->belongsToMany(Country::Class,
                                    'country_languages', 'language_id' , 'country_id');
    }
}
