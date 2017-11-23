<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
     protected $primaryKey='id_restaurante';


     public function produtos(){
     	return $this->hasMany('App\Produto','id_restaurante');
     }
}
