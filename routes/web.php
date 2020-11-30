<?php

// Begin: Home Page
  Route::get('/', 'Home\HomeController@HomeView');
  Route::get('/home', ['as' => 'home','uses' => 'Home\HomeController@HomeView']);
  Route::get('/admin-home', ['as' => 'adminHome','uses' => 'Home\HomeController@adminHome']);
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
  Route::get('contact-us', ['as' => 'contactUsView','uses' => 'ContactUs\ContactUsController@contactUsView']);
  Route::post('save-contact-us', ['as' => 'saveContactUs','uses' => 'ContactUs\ContactUsController@saveContactUs']);
// End: Contact Us

// Begin: Authentication
Auth::routes();
Route::get('check-email-exist', ['as' => 'checkEmailExist','uses' => 'Auth\RegisterController@checkEmailExist']);
// End:Authentication
