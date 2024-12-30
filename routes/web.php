<?php

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\foodsController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PaymentContoller;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});



// ---------------------- USERS , LOGIN, REGISTER ----------------


Route::get('login', [UsersController::class, "loginUser"]);
Route::post('submit_login', [UsersController::class, "submit_login"]);
Route::get('register', [UsersController::class, "register"]);
Route::post('register', [UsersController::class, "store_new_user"]);
Route::get("add_address", [UsersController::class, "create_address"]);
Route::post("store_address", [UsersController::class, "store_address"]);
Route::get("profile_picture", [UsersController::class, "create_profile"]);
Route::post("store_profile_pic", [UsersController::class, "store_profile_pic"]);
Route::get('logout', [UsersController::class, "logOutUser"]);


// ------------------------ P R O F I L E -------

Route::get('profile/personalInformations', [ProfileController::class, "index"]);
Route::post('update_user_info',[ProfileController::class ,'update_userInfo'])->name('update_user_info');
Route::post('update_address_info',[ProfileController::class ,'update_address_info'])->name('update_address_info');
Route::get('profile/Addresses_management', [ProfileController::class, "show_addresses_management"]);
Route::post("set_as_default", [ProfileController::class, "set_ad_default"])->name('set_as_default');
Route::post("deletea_ddress", [ProfileController::class, "deletea_ddress"])->name('deletea_ddress');
Route::get("profile/customer_Support", [ProfileController::class, "show_customerSupport"]);
Route::get("profile/history", [CommandController::class, "show_commands_history"]);


route::get("addAddressForOrder" ,[ProfileController::class, "addAddressForOrder"]);
route::get("addNewAddress" ,[ProfileController::class, "addNewAddress"]);
route::get("addNewCard" ,[ProfileController::class, "addNewCard"]);


// ------------------- P A Y M E N T  _ M E T H O D _ M A N A G M E N T  ---------------------

Route::get("profile/payment_methods", [ProfileController::class, "show_paymentPage"]);
Route::get('addCardForOrder', [PaymentContoller::class, 'addCardForOrder'])->name('addCardForOrder');
Route::get('add_Payment_Method', [PaymentContoller::class, 'create'])->name('add_Payment_Method');
Route::post('store_payment', [PaymentContoller::class, 'store']);
Route::post('se_card_as_defaul', [PaymentContoller::class, 'se_card_as_defaul'])->name('se_card_as_defaul');
Route::post('delete_paymentMethod', [PaymentContoller::class, 'delete_card'])->name('delete_paymentMethod');



// ------------------------ MEALS MANGEMENT -------


Route::get('c', [foodsController::class, "getCombos"]);
Route::get('f', [foodsController::class, "getFruits"]);

Route::get('start_building', [MealController::class, "startBuildingMeal"]);
Route::get('cancelBuilding', [MealController::class, "cancelBuildingMeal"]);
Route::post('add_item_to_meal', [MealController::class, "add_item_to_meal"])->name("add_item_to_meal");
Route::post('decease_item_from_meal', [MealController::class, "decrease_item_from_meal"]);
Route::get('show_meal', [MealController::class, "show_meal"]);

// ----------

Route::get('popular_meals', [foodsController::class, "getEdibleFoodstuffs"])->name("popular_meals");
Route::get('sodas', [foodsController::class, "getDrinkableFoodstuffs"]);
Route::get('juices', [foodsController::class, "getDrinkable_juices_Foodstuffs"]);

//  --------- C O M M A N D S  _  M A N A G E M E N T -------
Route::get('initializeOrdering' ,[CommandController::class , "startSingleProdCommanf" ])->name("initializeOrdering");


Route::get('start_creating_order' ,[CommandController::class  ,'start_creating_order']);
Route::get('create_command/select_address' ,[CommandController::class  ,'show_select_address']);
Route::post('nextToPaymentMethod' ,[CommandController::class  ,'nextToPaymentMethod'])->name('nextToPaymentMethod');
Route::get('create_command/select_payment_method' ,[CommandController::class  ,'show_select_paymentPAGe'])->name('create_command/select_payment_method');
Route::post('nextToChoseQauntity' ,[CommandController::class  ,'nextToChoseQauntity'])->name('nextToChoseQauntity');
Route::get('create_command/select_quantity' ,[CommandController::class  ,'show_select_qauntity'])->name('create_command/select_quantity');
Route::post('increaseCommandQuantity' ,[CommandController::class  ,'increaseCommandQuantity'])->name('increaseCommandQuantity');
Route::post('decreaseCommandQuantity' ,[CommandController::class  ,'decreaseCommandQuantity'])->name('decreaseCommandQuantity');
Route::get('startCommandFromMeal' ,[CommandController::class  ,'startCommandFromMeal'])->name('startCommandFromMeal');
Route::get('goTOConfirmCommand' ,[CommandController::class  ,'goTOConfirmCommand'])->name('goTOConfirmCommand');
Route::get('store_command' ,[CommandController::class  ,'store_command'])->name('store_command');
Route::get('Command_requested',[CommandController::class  ,'command_requested']);

// ADMIN  -------------------
Route::get('/admin', [AdminController::class, "index"]);
Route::post("add_article", [AdminController::class, "add_article"])->name('add_article');

// EXERCOCES



// Route::get('/stagaires', [App\Http\Controllers\stagairecontroller::class, 'index']);
// Route::get('/add_stagaire', [App\Http\Controllers\stagairecontroller::class, 'create']);
// Route::post('/store_stagiaire', [App\Http\Controllers\stagairecontroller::class, 'store'])->name("store_stagiaire");







// EXERCOCES 
// Route::get('/services', function () {
//     return "Nos services";
// });
// Route::get('/user/{id}', function ($id) {
//     return "Utilisateur avec l'ID : $id";
// });



// Route::get('/users/{id?} ', [App\Http\Controllers\UsersController::class, "getUserInfo"])->name('user');

// Route::post('login', [App\Http\Controllers\UsersController::class, "getUserInfo"])->name('login');

Route::get('/contact', function () {
    return "page contact";
})->name('contact');



Route::get('/show-contact', function () {
    return '<a href="' . route('contact') . '">Accéder à la page de contact</a>';
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Tableau de bord administrateur';
    });
    Route::get('/profile', function () {
        return 'Profil administrateur';
    });
    Route::get('/settings', function () {
        return 'Paramètres administrateur';
    });
});


Route::get('/new-page', function () {
    return "Vous êtes sur la nouvelle page";
})->name('new-page');

Route::get('/old-page', function () {
    return redirect()->route('new-page');
});

Route::get('/new-page', function () {
    return "Vous êtes sur la nouvelle page";
})->name('new-page');
Route::get('/active', function () {
    return "page active";
})->name('active');

Route::get('/inactive', function () {
    return "page inactive";
})->name('inactive');

Route::get('/check-status/{status}', function ($status) {
    if ($status == 'active') {
        return redirect()->route('active');
    } else {
        return redirect()->route('inactive');
    }
});



Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Tableau de bord administrateur';
    });
    Route::get('/profile', function () {
        return 'Profil administrateur';
    });
    Route::get('/settings', function () {
        return 'Paramètres administrateur';
    });
});

// Route::get('/users', [UserContoller::class, 'index']); 
// Route::get('/users/{id}', [UserContoller::class, 'show']);


// exercice 1:
// part 1
route::get('/test/{name?}', function ($name = null) {
    return view("mer", ['name' => $name]);
});


// part 2
Route::get('/page-items', function () {
    $items = ['name ', 'phone number', 'email'];
    return view('mer', ['items' => $items]);
});


// part 3
Route::get('/page-status', function () {
    $status = 'pending';
    return view('mer', ['status' => $status]);
});
Route::get('/page', function () {
    return view('mer');
});
