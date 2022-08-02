<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //tabla a conectar a este modelo
    protected $table="continents";
    //clave primaria de la tabla
    protected $primarykey="continent_id";
    //omitir campos de autoridad
    public $timestamps=false;

    use HasFactory;
}
