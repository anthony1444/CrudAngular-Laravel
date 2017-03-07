<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table="Charges";
    protected $fillable=['name_charge'];
    /* public function worker(){
     	 return $this->hasMany('App\Workers');
     }*/
}
