<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeCozinha extends Model
{
    protected $primaryKey='id_cozinha';

     public function restaurantes(){
     	return $this->hasMany('App\Restaurante','id_cozinha');
     }
}
