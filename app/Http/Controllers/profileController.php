<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addresses;
class profileController extends Controller
{
    public function index()
    {
        return view('user.profile.personalInfo');
    }
    public function update_userInfo(Request $r)
    {
        try {
            Auth::user()->update([$r->key => $r->value]);
            return 'done';
        } catch (\Throwable $t) {
            return response()->json($t->getMessage());
        }
    }
    // --------- ADDRESS SETTING --------

    public function update_address_info(Request $r)
    {
        try {
            Auth::user()->address()->where('is_default', true)->update([$r->key => $r->value]);
            return 'done';
        } catch (\Throwable $t) {
            return response()->json($t->getMessage());
        }
    }
    public function show_addresses_management(){
        return view('user.profile.addressesManagment');
    }
    public function set_ad_default(Request $r)
    {
        try {
            if ($r->has('id')) {
                if (Auth::user()->address()->where('id', $r->id)) {
                    Auth::user()->address()->update(['is_default' => false]);
                    Auth::user()->address()->where('id', $r->id)->update(['is_default' => true]);
                    return response()->json('Done');
                } else {
                    return response()->json('This id ( ' . $r->id . ' ) is not available in the database !');
                }
            }
        } catch (\Throwable $t) {
            return response()->json($t->getMessage());
        }
    }

    public function addAddressForOrder(){
        session(['wantToAddAddressForOrder'=> true]);
        return redirect('add_address');
    }
    public function addNewAddress(){
        session(['wantToAddAddress'=>true]);
        return redirect('add_address');
    }
    public function addNewCard(){
        session(['wantToAddCard'=>true]);
        return redirect('add_Payment_Method');
    }
    public function deletea_ddress(Request $r){
        Auth::user()->address()->where('id' ,$r->id)->delete();
        return true;
    }

    // ----------- SHOW PAYMENT METHODS PAGE -------------
    public function show_paymentPage(){
        return view('user.profile.payment_methods');
    }
    // Customer Support ------------
    public function show_customerSupport(){
        $faqs= DB::table('questions')->get();
        return view("user.profile.CustomerSupport" ,compact('faqs'));
    }


}
