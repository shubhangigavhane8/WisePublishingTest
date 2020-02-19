<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table = 'ap_states';

    function foodItem(){

        return $this->hasMany('App\foodItem','state_id','id');
    }

}
