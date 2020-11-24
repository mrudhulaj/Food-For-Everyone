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
  Route::get('available-foods', ['as' => 'availableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodsView']);
  Route::get('add-food-view', ['as' => 'addAvailableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsView']);
  Route::post('add-food-save', ['as' => 'addAvailableFoodsSave','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsSave']);
  Route::get('available-food-list', ['as' => 'availableFoodListFilter','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodListFilter']);
// End: Available Foods

// Begin: Causes
  Route::get('causes', ['as' => 'causesView','uses' => 'Causes\CausesController@causesView']);
  Route::get('causes-details', ['as' => 'causesDetails','uses' => 'Causes\CausesController@causesDetailsView']);
  Route::get('add-causes', ['as' => 'addCauseView','uses' => 'Causes\CausesController@addCauseView']);
  Route::post('add-cause-save', ['as' => 'addCauseSave','uses' => 'Causes\CausesController@addCauseSave']);
// End: Causes

// Begin: Volunteers
  Route::get('volunteers', ['as' => 'volunteersView','uses' => 'Volunteers\VolunteersController@volunteersView']);
  Route::get('add-volunteer', ['as' => 'addVolunteerView','uses' => 'Volunteers\VolunteersController@addVolunteerView']);
  Route::post('add-volunteer-save', ['as' => 'addVolunteerSave','uses' => 'Volunteers\VolunteersController@addVolunteerSave']);
// End: Volunteers

// Begin: Events
  Route::get('events-view', ['as' => 'eventsView','uses' => 'Events\EventsController@eventsView']);
  Route::get('add-event-view', ['as' => 'addEventView','uses' => 'Events\EventsController@addEventView']);
  Route::post('add-event-save', ['as' => 'addEventSave','uses' => 'Events\EventsController@addEventSave']);
  Route::get('event-details', ['as' => 'eventDetailsView','uses' => 'Events\EventsController@eventDetailsView']);
// End: Events

// Begin: Contact Us
  Route::get('contact-us', ['as' => 'contactUs','uses' => 'ContactUs\ContactUsController@contactUsView']);
// End: Contact Us


Route::get('/donation' ,'DonationController@FormDonation');

Route::post('/insert-donation','DonationController@InsertDonation');

Route::get('/otheritems','OtherItemsController@ViewData');

Route::get('edit-donation/{id}','DonationController@EditData');

Route::get('delete-donation/{id}','DonationController@DeleteData');

Route::post('update-donation','DonationController@UpdateData');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
