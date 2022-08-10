<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla a conectar
    protected $table = "countries";
    //la clave primaria de esa tabla 
    protected $primaryKey = "country_id";
    //omiti campos de auditoria
    public $timestamps =false; 
    use HasFactory;

    //Relacion con region 
    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }

    //relacion con lenguaje
    public function idiomas(){
        return $this->belongsToMany(Language::class, 'country_languages', 'country_id', 'language_id')->withPivot('official');
    }
}
