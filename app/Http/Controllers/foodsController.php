<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\foodstuffs;
use Illuminate\Support\Facades\DB;

class foodsController extends Controller
{
    public function getEdibleFoodstuffs()
    {
        $EdibleFoodstuffs = foodstuffs::where('phusical_type', 'edible')
            ->whereIn('type', ['burger', 'pizza', 'Taco', 'Chicken', 'Dumpling', 'Sushi'])
            ->get();
        $fudsData = [];
        foreach ($EdibleFoodstuffs as  $f) {
            $fudsData[$f->type][] = $f;
        }
        return  view('services.fast_food_rdring.s1', compact("fudsData"));
    }
    public function getDrinkableFoodstuffs()
    {
        $EdibleFoodstuffs = foodstuffs::where('phusical_type', 'drinkable')
            ->whereIn('type', [
                'coca_cola_sodas',
                'pepsi_sodas',
                'redbull_sodas',
                'hawaiian_sodas',
                'spritz_sodas',
                'fanta_sodas',
                '7UP_sodas',
                'Poms_sodas'
            ])
            ->get();
        $fudsData = [];
        foreach ($EdibleFoodstuffs as  $f) {
            $fudsData[$f->type][] = $f;
        }

        return  view('services.fast_food_rdring.s1', compact("fudsData"));
    }
    public function getDrinkable_juices_Foodstuffs()
    {
        $EdibleFoodstuffs = foodstuffs::where('phusical_type', 'drinkable')
            ->whereIn('type', [
                'fruit_juice',
                'vegetable_juice',
                'mixed_juices',
                'Detox_or_cleansing_juices',
                'cold-pressed_juices',
                'concentrated_juices',
                'smoothies',
                'lemonade'
            ])
            ->get();
        $fudsData = [];
        foreach ($EdibleFoodstuffs as  $f) {
            $fudsData[$f->type][] = $f;
        }

        return  view('services.fast_food_rdring.s1', compact("fudsData"));
    }

    public function getCombos(){
        $combos = foodstuffs::where("type" ,"combo")->get();
        return view("services.fast_food_rdring.compos" ,compact('combos'));
    }

    public function getFruits(){
        $fruits = foodstuffs::where("type" ,"fruit")->get();
        return view("services.fast_food_rdring.Filefruits" ,compact('fruits'));
    }
   

}
