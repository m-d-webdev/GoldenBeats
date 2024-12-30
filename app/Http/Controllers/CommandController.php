<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\commands;
use App\Models\command_items;
use App\Models\foodstuffs;
use App\Models\payment_methods;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\SessionBagProxy;

class CommandController extends Controller
{
    
    public function show_commands_history()
    {

        $all = Auth::user()->commands()->with("items.food")->with("address")->with('payment_method')->get();
        return view("user.profile.commandsHistory", compact('all'));
    }
    // -------------

    
    public function startSingleProdCommanf(Request $req)

    {
        $r= $req->query('data');
        return  $this->start_creating_order([$r['id']=>['quantity'=> $r['quantity'] ,"price" =>$r['price'] ]]);
    }

    
    public function startCommandFromMeal()
    {
        return  $this->start_creating_order(session("meal"));
    }



    // ----------C R E A T I N G _ _  O R D E R  _ _ S T I P S  ---

    public function start_creating_order($r)
    {
        $command = session('command', []);
        $command['items'] = $r;
        session(['command' => $command]);
        if(Auth::check()){
            return redirect('create_command/select_address');
        }else{
            return redirect("login");
        }
    }
    public function show_select_address()
    {
        $defaultaddress = Auth::user()->address()->where("is_default", true)->first();
        return view('services.createOrder', ['defaultaddress' => $defaultaddress]);
    }

    public  function nextToPaymentMethod(Request $r)
    {
        try {
            $command = session('command', []);
            $command['address_id'] = $r->address_id;
            session(['command' => $command]);
            return "DONE";
        } catch (\Throwable $t) {
            return $t->getMessage();
        }
    }

    public function show_select_paymentPAGe()
    {
        $defaultPaymentMethod = Auth::user()->paymenth_method()->where("is_default", true)->first();
        return view('services.createOrder', ["defaultPaymentMethod" => $defaultPaymentMethod]);
    }


    // -----------

    public  function nextToChoseQauntity(Request $r)
    {
        try {
            $command = session('command', []);
            $command['card_id'] = $r->cardId;
            session(['command' => $command]);
            return "DONE";
        } catch (\Throwable $t) {
            return $t->getMessage();
        }
    }

    public function show_select_qauntity()
    {
        $command = session()->get("command", []);

        foreach (array_keys($command['items']) as $key) {
            $command['items'][$key] = ["food" => foodstuffs::find($key), "quantity" =>  $command['items'][$key]['quantity']];
        }


        $totalePrice = array_reduce($command['items'], fn($c, $item) => $c + ($item['food']['price'] * $item['quantity']), 0);
        return view('services.createOrder', ["command_items" => $command, "totalePrice" => $totalePrice]);
    }

    public function increaseCommandQuantity(Request $r)
    {
        try {
            $id = $r->id;
            $command = session("command");
            $command['items'][$id]['quantity'] = $command['items'][$id]['quantity'] + 1;
            session(["command" => $command]);
            $command['items'][$id]['food'] = foodstuffs::find($id);
            $newElem = $this->update_elem($command['items'][$id]);
            $NewTotalePrice = array_reduce($command['items'], fn($c, $i) => $c + ($i['price'] * $i['quantity']), 0);
            return response()->json([
                "newTotalePrice" => $NewTotalePrice,
                "newElem" => $newElem
            ]);
        } catch (\Throwable $t) {
            return $t->getMessage();
        }
    }
    public function decreaseCommandQuantity(Request $r)
    {
        try {
            $id = $r->id;
            $command = session("command");
            if ($command['items'][$id]['quantity'] > 1) {
                $command['items'][$id]['quantity'] = $command['items'][$id]['quantity'] - 1;
                session(["command" => $command]);
                $command['items'][$id]['food'] = foodstuffs::find($id);
                $newElem = $this->update_elem($command['items'][$id]);
                $NewTotalePrice = array_reduce($command['items'], fn($c, $i) => $c + ($i['price'] * $i['quantity']), 0);
                return response()->json([
                    "newTotalePrice" => $NewTotalePrice,
                    "newElem" => $newElem
                ]);
            } else {
                unset($command['items'][$id]);
                session(["command" => $command]);
                if (count($command['items'])  == 0) {
                    return "NO MORE ITEMS;";
                } else {
                    $NewTotalePrice = array_reduce($command['items'], fn($c, $i) => $c + ($i['price'] * $i['quantity']), 0);
                    return response()->json([
                        "newTotalePrice" => $NewTotalePrice,
                        "deleted" => true
                    ]);
                }
            }
        } catch (\Throwable $t) {
            return $t->getMessage();
        }
    }

    public function update_elem($i)
    {
        return view('services.newCommandElem', compact('i'))->render();
    }
    // ---------------

    public function goTOConfirmCommand()
    {
        $command = session('command');
        $totalePrice = array_reduce($command['items'], fn($c, $i) => $c + ($i['price'] * $i['quantity']), 0);
        $command['payment_method_info'] = payment_methods::find($command['card_id']);
        $command['address_info'] = Auth::user()->address()->where("id", $command['address_id'])->get()[0];
        foreach (array_keys($command['items']) as $key) {
            $command['items'][$key] = ["food" => foodstuffs::find($key), "quantity" =>  $command['items'][$key]['quantity']];
        }
        // return $command;
        return view('services.createOrder', ["comfirmCommand" => true, "FINALE_COMMAND" => $command, "totalePrice" => $totalePrice]);
    }


    public function store_command()
    {
        try {
            $command = session('command');
            $commandId = uniqid();
            if (!commands::where('command_id', $commandId)->exists()) {
            } else {
                $commandId = $commandId . uniqid();
            }
            commands::create([
                'command_id' => $commandId,
                'user_id' => Auth::user()->id,
                'address_id' => $command['address_id'],
                'payment_method_id' => $command['card_id'],
                'total_price' => 0,
            ]);
            foreach ($command['items'] as $key => $val) {
                command_items::create([
                    "command_id" => $commandId,
                    "item_id" => $key,
                    "quantity" => $command['items'][$key]['quantity'],
                ]);
            }
            Session::forget("command");
            return redirect("Command_requested");
        } catch (\Throwable $t) {
            return response()->json($t->getMessage());
        }
    }
    public function command_requested()
    {
        return view('services.createOrder', ['commmandAddedSuccess' => true]);
    }
}
