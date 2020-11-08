<?php

// Begin: Home Page

Route::get('/', function () {
    return view('home');
});

Route::get('/home' ,'HomeController@HomeView');

// End: Home Page

// Begin: About Us

Route::get('/about-us', ['as' => 'aboutUs','uses' => 'AboutUs\AboutUsController@aboutUsView']);

// End: About Us


Route::get('/donation' ,'DonationController@FormDonation');

Route::get('/availablefoods' ,'AvailableFoodsController@ViewData');

Route::post('/insert-donation','DonationController@InsertDonation');

Route::get('/otheritems','OtherItemsController@ViewData');

Route::get('edit-donation/{id}','DonationController@EditData');

Route::get('delete-donation/{id}','DonationController@DeleteData');

Route::post('update-donation','DonationController@UpdateData');

