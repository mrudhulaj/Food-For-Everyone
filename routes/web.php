<?php

// Begin: Normal Views
  // Home Page
    Route::get('/', 'Home\HomeController@HomeView');
    Route::get('/home', ['as' => 'home','uses' => 'Home\HomeController@HomeView']);
  // About Us
    Route::get('about-us', ['as' => 'aboutUs','uses' => 'AboutUs\AboutUsController@aboutUsView']);

  // Available Foods
    Route::get('available-foods', ['as' => 'availableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodsView']);
    Route::get('add-food-view', ['as' => 'addAvailableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsView']);
    Route::post('add-food-save', ['as' => 'addAvailableFoodsSave','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsSave']);
    Route::get('available-food-list', ['as' => 'availableFoodListFilter','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodListFilter']);
    Route::get('edit-food-view', ['as' => 'editAvailableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsView']);
    Route::get('edit-food-data', ['as' => 'editAvailableFoodsData','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsData']);
    Route::post('edit-food-data-save', ['as' => 'editAvailableFoodsDataSave','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsDataSave']);
  // Causes
    Route::get('causes', ['as' => 'causesView','uses' => 'Causes\CausesController@causesView']);
    Route::get('causes-details', ['as' => 'causesDetails','uses' => 'Causes\CausesController@causesDetailsView']);
    Route::get('add-causes', ['as' => 'addCauseView','uses' => 'Causes\CausesController@addCauseView']);
    Route::post('add-cause-save', ['as' => 'addCauseSave','uses' => 'Causes\CausesController@addCauseSave']);

  // Volunteers
    Route::get('volunteers', ['as' => 'volunteersView','uses' => 'Volunteers\VolunteersController@volunteersView']);
    Route::get('add-volunteer', ['as' => 'addVolunteerView','uses' => 'Volunteers\VolunteersController@addVolunteerView']);
    Route::post('add-volunteer-save', ['as' => 'addVolunteerSave','uses' => 'Volunteers\VolunteersController@addVolunteerSave']);

  // Events
    Route::get('events-view', ['as' => 'eventsView','uses' => 'Events\EventsController@eventsView']);
    Route::get('add-event-view', ['as' => 'addEventView','uses' => 'Events\EventsController@addEventView']);
    Route::post('add-event-save', ['as' => 'addEventSave','uses' => 'Events\EventsController@addEventSave']);
    Route::get('event-details', ['as' => 'eventDetailsView','uses' => 'Events\EventsController@eventDetailsView']);

  // Contact Us
    Route::get('contact-us', ['as' => 'contactUsView','uses' => 'ContactUs\ContactUsController@contactUsView']);
    Route::post('save-contact-us', ['as' => 'saveContactUs','uses' => 'ContactUs\ContactUsController@saveContactUs']);

  // Authentication
  Auth::routes();
  Route::get('check-email-exist', ['as' => 'checkEmailExist','uses' => 'Auth\RegisterController@checkEmailExist']);
// End: Normal Views

// Begin: Admin Views
  // Dashboard
    Route::get('/admin-dashboard', ['as' => 'adminDashboardView','uses' => 'AdminModule\DashboardController@adminDashboardView']);
  
  // Permissions
    Route::get('/admin-permissions', ['as' => 'adminPermissionsView','uses' => 'AdminModule\PermissionsController@adminPermissionsView']);
    Route::get('/admin-permissions-save', ['as' => 'adminPermissionsSave','uses' => 'AdminModule\PermissionsController@adminPermissionsSave']);

// End: Admin Views
