<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
	protected $table="workers";
    protected $fillable=[
'cedula','nombre','apellido','email', 'charge',

    ];
   /* public function charge(){
    	return $this->belongsTo('App\Charge');
    }*/
}

