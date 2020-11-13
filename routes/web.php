<?php

// Begin: Home Page
  Route::get('/', function () {
      return view('home');
  });
  Route::get('home', ['as' => 'home','uses' => 'Home\HomeController@HomeView']);
// End: Home Page

// Begin: About Us
  Route::get('about-us', ['as' => 'aboutUs','uses' => 'AboutUs\AboutUsController@aboutUsView']);
// End: About Us

// Begin: Available Foods
  Route::get('available-foods', ['as' => 'availableFoods','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodsView']);
// End: Available Foods

// Begin: Causes
  Route::get('causes', ['as' => 'causes','uses' => 'Causes\CausesController@causesView']);
  Route::get('causes-details', ['as' => 'causesDetails','uses' => 'Causes\CausesDetailsController@causesDetailsView']);
// End: Causes

// Begin: Contact Us
  Route::get('contact-us', ['as' => 'contactUs','uses' => 'ContactUs\ContactUsController@contactUsView']);
// End: Contact Us


Route::get('/donation' ,'DonationController@FormDonation');

Route::get('/availablefoods' ,'AvailableFoodsController@ViewData');

Route::post('/insert-donation','DonationController@InsertDonation');

Route::get('/otheritems','OtherItemsController@ViewData');

Route::get('edit-donation/{id}','DonationController@EditData');

Route::get('delete-donation/{id}','DonationController@DeleteData');

Route::post('update-donation','DonationController@UpdateData');

