<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //tabla a conectar a este modelo
    protected $table="countries";
    //clave primaria de la tabla
    protected $primaryKey="country_id";
    //omitir campos de auditoria
    public $timestamps=false;
    use HasFactory;

    //relacion M:M entre paises e idiomas
    public function idiomas(){
        //belongsToMany : parametrros
        //1- modelo a relacionar
        //2- la tabla pivote
        //3-fk del modelo actual en el pivote
        //4fk del modelo a relacionar en el pivote
        return $this->belongsToMany(Idioma::Class,
                                    'country_languages', 'country_id', 'language_id')->withPivot('official');
    }

    public function Region(){
        return $this->belongsTo(Region::class, 'region_id');
    }
}
