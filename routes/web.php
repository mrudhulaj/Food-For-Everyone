<?php

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

// use App\Http\Controllers\DonationController;
// use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home' ,'HomeController@HomeView');


Route::get('/donation' ,'DonationController@FormDonation');

Route::get('/availablefoods' ,'AvailableFoodsController@ViewData');

Route::post('/insert-donation','DonationController@InsertDonation');

Route::get('/otheritems','OtherItemsController@ViewData');

Route::get('edit-donation/{id}','DonationController@EditData');

Route::get('delete-donation/{id}','DonationController@DeleteData');

Route::post('update-donation','DonationController@UpdateData');

