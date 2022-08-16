<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //tabla a conectar a este modelo
    protected $table="continents";
    //clave primaria de la tabla
    protected $primaryKey="continent_id";
    //omitir campos de auditoria
    public $timestamps=false;

    use HasFactory;
    //Relacion entre continentes y region
    public function regiones(){
        //hasmany Parametros:
        //1. modelo a relacionar
        //2.la fk del model actual en  
        //el modelo a relacionar
        return $this->hasMany(Region::class ,
                            'continent_id');
        
    }
    //relacion entre continente y sus paises
    //Abuelo:Continent
    //Region : papá
    //Nieto:paises
    public function paises(){
        //hasManyThrough parametros
        //1. modelo nieto 
        //2. Modelo papá
        //3. Fk del abuelo en el papá
        return $this->hasManyThrough(Country::Class, 
                                     Region::class, 
                                     'continent_id',
                                     'region_id');
    }
    public function Country(){
        return $this->belongsTo(Country::class, 'continent_id');
    }
}
