<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";

    protected $fillable = [
    	'area_id', 'subarea_id', 'empresa_id', 'ciudad_id', 'cupo_id', 'nombre', 'cargo', 'telefono', 'celular', 'email', 'direccion', 'especializado', 
	];

}
