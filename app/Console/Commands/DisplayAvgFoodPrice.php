<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\state;

class DisplayAvgFoodPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DisplayAvgFoodPrice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the average prices for each of the food items by state.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = state::with('foodItem')
            ->join('ap_copi', 'ap_copi.state_id', '=', 'ap_states.id')
            ->selectRaw('ap_states.state')
            ->selectRaw('AVG(ap_copi.steak) as Steak')
            ->selectRaw('AVG(ap_copi.grnd_beef) as Ground_Beef')
            ->selectRaw('AVG(ap_copi.sausage) as Sausage')
            ->selectRaw('AVG(ap_copi.fry_chick) as Fried_Chicken')
            ->selectRaw('AVG(ap_copi.tuna) as Tuna')
            ->groupBy('ap_states.id')
            ->get();

         
            foreach ($data as $value) :
                $this->info("$value->state: Steak($value->Steak), Ground Beef($value->Ground_Beef),Sausage($value->Sausage), Fried_Chicken($value->Fried_Chicken), Tuna($value->Tuna)");
            endforeach;
    }
}
