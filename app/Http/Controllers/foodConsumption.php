<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\state;

class foodConsumption extends Controller
{
    function index(){
     
        return $data = state::join('ap_copi', 'ap_copi.state_id', '=', 'ap_states.id')
                    ->selectRaw('ap_states.state')
                    ->selectRaw('AVG(ap_copi.steak) as Steak')
                    ->selectRaw('AVG(ap_copi.grnd_beef) as Ground_Beef')
                    ->selectRaw('AVG(ap_copi.sausage) as Sausage')
                    ->selectRaw('AVG(ap_copi.fry_chick) as Fried_Chicken')
                    ->selectRaw('AVG(ap_copi.tuna) as Tuna')
                    ->groupBy('ap_states.id')
                    ->get();

    }
    
}
