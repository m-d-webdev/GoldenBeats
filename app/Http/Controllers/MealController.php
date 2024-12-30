<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\foodstuffs;
use Psy\CodeCleaner\ReturnTypePass;
use Throwable;

class MealController extends Controller
{
    public function startBuildingMeal()
    {
        session(["isBuilding" => true]);
        session(["meal" => []]);
        return back();
    }

    public function show_meal(){
        $data = foodstuffs::whereIn("id" ,array_keys(session("meal")))->get();
        return view('services.fast_food_rdring.show_meal' ,['data' => $data]);
    }   

    public function  cancelBuildingMeal()
    {
        session(['isBuilding' => false]);
        return redirect("c");
    }

    public function add_item_to_meal(Request $r)
    {
        try {
            $meal = session()->get('meal', []);
            if (array_key_exists($r->id, $meal)) {
                $meal[$r->id] = ['quantity' => $meal[$r->id]['quantity'] + 1, 'price' => $r->price];
            } else {
                $meal[$r->id] = ['quantity' => 1, 'price' => $r->price];
            }
            session(["meal" => $meal]);
            $totleprice = array_reduce($meal, fn($c, $item) => $c + ($item['price'] * $item['quantity']), 0);
            $newElem = $this->updateElem($r->id);
            return response()->json([
                'newElem' => $newElem,
                'count' => array_reduce($meal, fn($c, $item) => $c + $item['quantity']),
                'totalePrice' => $totleprice
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }
    public function decrease_item_from_meal(Request $r)
    {
        try {
            $meal = session()->get('meal', []);
            if ($meal[$r->id]['quantity'] > 1) {
                $meal[$r->id] = ['quantity' => $meal[$r->id]['quantity'] - 1, 'price' => $meal[$r->id]['price']];
            } else {
                unset($meal[$r->id]);
            }
            session(["meal" => $meal]);
            $totleprice = array_reduce($meal, fn($c, $item) => $c + ($item['price'] * $item['quantity']), 0);
            $newElem = $this->updateElem($r->id);
            return response()->json([
                'newElem' => $newElem,
                'count' => array_reduce($meal, fn($c, $item) => $c + $item['quantity'], 0),
                'totalePrice' => $totleprice
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    public function updateElem($id)
    {
        try {
            $i = foodstuffs::find($id);
            return view('services.fast_food_rdring.updatedElem', ['i' => $i])->render();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
