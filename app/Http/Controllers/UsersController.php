<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addresses;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function loginUser()
    {
        return view("user.login");
    }

    public function register()
    {
        return view("user.register");
    }

    public function submit_login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => "required"]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has("rememberMe"))) {
            session()->regenerate();
            return redirect('/');
        } else {
            return back()->withErrors(['failed' => 'Login failed ! , Check the information']);
        }
    }

    public function store_new_user(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:users,email', 'name' => "required|string|max:280", 'password' => 'required|min:1']);

        if (!User::where('email', $request->email)->exists()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            Auth::login($user, $request->has('rememberMe'));
            return  redirect("add_address");
        } else {
            return view('/register', ['errorEmail' => 'Email Already Exists']);
        }
    }

    public function create_address()
    {
        if (session('wantToAddAddressForOrder') === true) {
            if (session('wantToAddAddress') != true) {
                return view('user.add_address', ['wantToAddAddressForOrder' => true]);
            } else {
                return view('user.add_address');
            }
        }
        return view('user.add_address');
    }
    public function store_address(Request $r)
    {
        $r->validate([
            'name' => 'required|string|min:4',
            'phone' => 'required|min:10|max:14',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
        ]);
        if ($r->has('is_default')) {
            auth()->user()->address()->update(["is_default" => false]);
            addresses::create([
                'phone' => $r->phone,
                'user_id' => Auth::user()->id,
                'streetAddress' => $r->street,
                'city' => $r->city,
                'state' => $r->state,
                'zip' => $r->zip,
                'additionalInstruction' => $r->instructions,
                'is_default' => true,

            ]);
            if (session('wantToAddAddress') == true) {
                Session::forget("wantToAddAddress");
                return redirect('profile/Addresses_management');
            } else {
                if (session("wantToAddAddressForOrder") == true) {
                    Session::forget("wantToAddAddressForOrder");
                    return redirect('create_command/select_address');
                } else {
                    return redirect("profile_picture");
                }
            }
        } else {
            if (auth()->user()->address()->where("is_default", true)->exists()) {
                addresses::create([
                    'phone' => $r->phone,
                    'user_id' => Auth::user()->id,
                    'streetAddress' => $r->street,
                    'city' => $r->city,
                    'state' => $r->state,
                    'zip' => $r->zip,
                    'additionalInstruction' => $r->instructions,
                    'is_default' => false,

                ]);
                if (session('wantToAddAddress') == true) {
                    Session::forget("wantToAddAddress");
                    return redirect('profile/Addresses_management');
                } else {
                    if (session("wantToAddAddressForOrder") == true) {
                        Session::forget("wantToAddAddressForOrder");
                        return redirect('create_command/select_address');
                    } else {
                        return redirect("profile_picture");
                    }
                }
            } else {
                return back()->withErrors(['first_be_default' => "You have to set this address as default , because it will be the first"])->withInput();
            }
        }
    }
    public function create_profile()
    {
        return view('/user.addProfPic');
    }
        
    public function store_profile_pic(Request $r)
    {
        $r->validate(["profile_pic" => "required|mimes:jpeg,png,jpg,gif,svg|max:2048"]);

        $img_file = $r->file('profile_pic');
        $IMG_STRONG_NAME = pathinfo($img_file->getClientOriginalName(), PATHINFO_FILENAME) . uniqid() . '.' . $img_file->getClientOriginalExtension();
        if ($img_file->move("users_profile", $IMG_STRONG_NAME)) {
            User::where("id", Auth::user()->id)->update(["path_PrfPic" => 'users_profile/' . $IMG_STRONG_NAME]);
            return redirect('/');
        } else {
            return back()->withErrors(['failed' => 'failed to save the profile picture !']);
        }
    }

    public function logOutUser()
    {

        session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
