<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a conectar
    protected $table = "continents";
    //la clave primaria de esa tabla 
    protected $primaryKey = "continent_id";
    //omiti campos de auditoria
    public $timestamps =false; 
    use HasFactory;

    //relacion entre continente y region 
    public function regiones(){
        return $this->hasMany(Region::class, 'continent_id');
    }

    //Relacion entre continente y pais
    public function paises(){
        return $this->hasManyThrough(Country::class, Region::class, 'continent_id','region_id','continent_id', 'region_id');

    }
}
