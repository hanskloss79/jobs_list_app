<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes
// index - Show all listings
// show - Show single listing
// create - show form to create new listing
// store - store new listing in database
// edit - show form to edit listing
// update - update listing in database
// destroy - delete listing

// All listings
Route::get('/', [ListingController::class, 'index']);
// inna metoda
// Route::get('/', 'App\Http\Controllers\ListingController@index');

// Show create form - only for authenticated user
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth');

// Store listing data - only for authenticated user
Route::post('/listings', [ListingController::class, 'store'])
    ->middleware('auth');

// Show edit form - only for authenticated user
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');

// Update listing in database - only for authenticated user
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');

// Remove listing from database - only for authenticated user
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');

// Manage listings which belong to logged User
Route::get('/listings/manage', [ListingController::class, 'manage'])
    ->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register/create user form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

// Store new user data
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout']);

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')
    ->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);








//////////////////////////////////////////////////////////////////
// TESTY

Route::get('/hello', function () {
    return response('<h1>Witajcie</h1>')
        ->header('Content-Type', 'text/plain')
        ->header('variable','value');
});
// use of wildcard with constrain - regular expression
Route::get('/posts/{id}', function($id){
    //ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // id musi być liczbą

// teraz podajemy coś w URL i to jest w Query /search?name=Piotr&city=Krakow
Route::get('/search', function(Request $request){
   // dd($request->name . ' ' . $request->city);
   return ($request->name . ' ' . $request->city);
});


/* stara wersja bez kontrolera
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Wykaz ogłoszeń',
        'listings' => Listing::all()
    ]);
});


// Wykorzystujemy route model binding - zawiera w sobie już komunikat 404 jeśli 
// nie ma takiego ogłoszenia
Route::get('/listings/{listing}', function(Listing $listing){
        return view('listing', [
            'listing' => $listing
        ]);
});
*/
// Single Listing
/*Route::get('/listings/{id}', function($id){
    $listing = Listing::find($id);
    if($listing) // jeśli $listing nie jest null
    {
        return view('listing', [
            'listing' => $listing
        ]);
    } else {
        abort('404');
    }  
});*/

?>
