<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\payment_methods;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PaymentContoller extends Controller
{
    public function create()
    {
        return view('user.addPayment');
    }
    public function addCardForOrder()
    {
        session(['wantaddCardForOrder' => true]);
        return view('user.addPayment');
    }
    public function store(Request $r)
    {
        $r->validate([
            'card_name' => 'required|string|max:255',
            'card_number' => 'required',
            'expiration_date' => 'required|date_format:Y-m',
            'cvv' => 'required|digits:3',
            'card_type' => 'required|string|in:Visa,MasterCard,AmEx,Discover',

        ]);

        if (auth()->user()->paymenth_method()->where("is_default", true)->exists()) {
            if ($r->has('is_default')) {
                Auth::user()->paymenth_method()->update(['is_default' => false]);
                Auth::user()->paymenth_method()->create([
                    'card_name' => $r->card_name,
                    'card_number' => Crypt::encrypt($r->card_number),
                    'expiration_date' => $r->expiration_date,
                    'cvv' => $r->cvv,
                    'card_type' => $r->card_type,
                    'is_default' => true
                ]);
                if (session('wantToAddCard') == true) {
                    session(['wantToAddCard' => false]);
                    return redirect("profile/payment_methods");
                } else {

                    return redirect('/');
                }
            } else {
                Auth::user()->paymenth_method()->create([
                    'card_name' => $r->card_name,
                    'card_number' => Crypt::encrypt($r->card_number),
                    'expiration_date' => $r->expiration_date,
                    'cvv' => $r->cvv,
                    'card_type' => $r->card_type,
                    'is_default' => false
                ]);
                if (session('wantToAddCard') == true) {
                    Session::forget('wantToAddCard');
                    return redirect("profile/payment_methods");
                } else {
                    if (session('wantaddCardForOrder') == true) {
                        Session::forget('wantaddCardForOrder');
                        return redirect('create_command/select_payment_method');
                    }
                    return redirect('/');
                }
            }
        } else {
            if ($r->has('is_default')) {
                Auth::user()->paymenth_method()->create([
                    'card_name' => $r->card_name,
                    'card_number' => Crypt::encrypt($r->card_number),
                    'expiration_date' => $r->expiration_date,
                    'cvv' => $r->cvv,
                    'card_type' => $r->card_type,
                    'is_default' => true
                ]);
                if (session('wantToAddCard') == true) {
                    Session::forget('wantToAddCard');
                    return redirect("profile/payment_methods");
                } else {
                    if (session('wantaddCardForOrder') == true) {
                        Session::forget('wantaddCardForOrder');
                        return redirect('create_command/select_payment_method');
                    }
                    return redirect('/');
                }
            } else {
                return back()->withErrors(["first_be_default" => 'You should make this your default payment method, as it will be the only !'])->withInput();
            }
        }
    }

    public function se_card_as_defaul(Request $r)
    {
        try {
            if ($r->has('id')) {
                if (Auth::user()->paymenth_method()->where('id', $r->id)) {
                    Auth::user()->paymenth_method()->update(['is_default' => false]);
                    Auth::user()->paymenth_method()->where('id', $r->id)->update(['is_default' => true]);
                    return response()->json('Done');
                } else {
                    return response()->json('This id ( ' . $r->id . ' ) is not available in the database !');
                }
            }
        } catch (\Throwable $t) {
            return response()->json($t->getMessage());
        }
    }
    public function delete_card(Request $r)
    {
        Auth::user()->paymenth_method()->where("id", $r->id)->delete();
        return "Done";
    }
}
