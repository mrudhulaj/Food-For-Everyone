<?php

// Begin: Normal Views
  // Home Page
    Route::get('/', 'Home\HomeController@HomeView');
    Route::get('/home', ['as' => 'home','uses' => 'Home\HomeController@HomeView']);
  // About Us
    Route::get('about-us', ['as' => 'aboutUs','uses' => 'AboutUs\AboutUsController@aboutUsView']);

  // Available Foods
    Route::get('available-foods', ['as' => 'availableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodsView']);
    Route::get('available-food-list', ['as' => 'availableFoodListFilter','uses' => 'AvailableFoods\AvailableFoodsController@availableFoodListFilter']);
    
    Route::group(['middleware' => ['auth']], function() {
      Route::get('add-food-view', ['as' => 'addAvailableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsView']);
      Route::post('add-food-save', ['as' => 'addAvailableFoodsSave','uses' => 'AvailableFoods\AvailableFoodsController@addAvailableFoodsSave']);
      Route::get('edit-food-view', ['as' => 'editAvailableFoodsView','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsView']);
      Route::get('edit-food-data', ['as' => 'editAvailableFoodsData','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsData']);
      Route::post('edit-food-data-save', ['as' => 'editAvailableFoodsDataSave','uses' => 'AvailableFoods\AvailableFoodsController@editAvailableFoodsDataSave']);
      Route::get('delete-food-data', ['as' => 'deleteAvailableFoodsData','uses' => 'AvailableFoods\AvailableFoodsController@deleteAvailableFoodsData']);
    });


  // Causes
    Route::get('causes', ['as' => 'causesView','uses' => 'Causes\CausesController@causesView']);
    Route::get('causes-details', ['as' => 'causesDetails','uses' => 'Causes\CausesController@causesDetailsView']);
    Route::group(['middleware' => ['auth']], function() {
      Route::get('add-causes', ['as' => 'addCauseView','uses' => 'Causes\CausesController@addCauseView']);
      Route::post('add-cause-save', ['as' => 'addCauseSave','uses' => 'Causes\CausesController@addCauseSave']);
      Route::get('edit-cause-view', ['as' => 'editCauseView','uses' => 'Causes\CausesController@editCauseView']);
      Route::get('edit-cause-data', ['as' => 'editCauseData','uses' => 'Causes\CausesController@editCauseData']);
      Route::post('edit-cause-data-save', ['as' => 'editCauseDataSave','uses' => 'Causes\CausesController@editCauseDataSave']);
      Route::get('delete-cause-data', ['as' => 'deleteCauseData','uses' => 'Causes\CausesController@deleteCauseData']);
      Route::get('delete-cause-image', ['as' => 'deleteCauseImage','uses' => 'Causes\CausesController@deleteCauseImage']);
    });

  // Volunteers
    Route::get('volunteers', ['as' => 'volunteersView','uses' => 'Volunteers\VolunteersController@volunteersView']);
    Route::group(['middleware' => ['auth']], function() {
      Route::get('add-volunteer', ['as' => 'addVolunteerView','uses' => 'Volunteers\VolunteersController@addVolunteerView']);
      Route::post('add-volunteer-save', ['as' => 'addVolunteerSave','uses' => 'Volunteers\VolunteersController@addVolunteerSave']);
      Route::get('del-volunteer-img', ['as' => 'delVolunteerImg','uses' => 'Volunteers\VolunteersController@delVolunteerImg']);
    });

  // User
    Route::group(['middleware' => ['auth']], function() {
      Route::get('edit-user', ['as' => 'editProfileView','uses' => 'User\UserController@editProfileView']);
      Route::post('edit-user-save', ['as' => 'editProfileSave','uses' => 'User\UserController@editProfileSave']);
      Route::get('del-user-img', ['as' => 'delProfileImg','uses' => 'User\UserController@delProfileImg']);
    });

  // Events
    Route::get('events-view', ['as' => 'eventsView','uses' => 'Events\EventsController@eventsView']);
    Route::get('event-details', ['as' => 'eventDetailsView','uses' => 'Events\EventsController@eventDetailsView']);

    Route::group(['middleware' => ['auth']], function() {
      Route::get('add-event-view', ['as' => 'addEventView','uses' => 'Events\EventsController@addEventView']);
      Route::post('add-event-save', ['as' => 'addEventSave','uses' => 'Events\EventsController@addEventSave']);
      
      Route::get('edit-event-view', ['as' => 'editEventView','uses' => 'Events\EventsController@editEventView']);
      Route::get('edit-event-data', ['as' => 'editEventData','uses' => 'Events\EventsController@editEventData']);
      Route::post('edit-event-data-save', ['as' => 'editEventDataSave','uses' => 'Events\EventsController@editEventDataSave']);
      Route::get('delete-event-data', ['as' => 'deleteEventData','uses' => 'Events\EventsController@deleteEventData']);
      Route::get('delete-event-image', ['as' => 'deleteEventImage','uses' => 'Events\EventsController@deleteEventImage']);
    });

  // Contact Us
    Route::get('contact-us', ['as' => 'contactUsView','uses' => 'ContactUs\ContactUsController@contactUsView']);
    Route::post('save-contact-us', ['as' => 'saveContactUs','uses' => 'ContactUs\ContactUsController@saveContactUs']);
    Route::group(['middleware' => ['auth']], function() {
      Route::get('contact-us-ticketData', ['as' => 'contactUsTicketData','uses' => 'ContactUs\ContactUsController@contactUsTicketData']);
    });

  //Donation Modal
    Route::post('add-donation', ['as' => 'addDonation','uses' => 'Donation\DonationController@addDonation']);

  // Authentication
    Auth::routes();
    Route::get('check-email-exist', ['as' => 'checkEmailExist','uses' => 'Auth\RegisterController@checkEmailExist']);
    Route::get('check-admin-exist', ['as' => 'checkAdminExist','uses' => 'Auth\RegisterController@checkAdminExist']);
    Route::get('get-country-list', ['as' => 'getCountryList','uses' => 'Auth\RegisterController@getCountryList']);


// End: Normal Views

// Begin: Admin Views

  // Adminn Access Error Page
  Route::get('/adminAccessError', ['as' => 'adminAccessError','uses' => 'AdminModule\DashboardController@adminAccessError']);

  Route::group(['middleware' => ['isAdmin']], function() {

    // Dashboard
    Route::get('/admin-dashboard', ['as' => 'adminDashboardView','uses' => 'AdminModule\DashboardController@adminDashboardView']);
    Route::get('/admin-menu-toggle', ['as' => 'adminMenuToggle','uses' => 'AdminModule\DashboardController@adminMenuToggle']);
    Route::get('admin-dashboard-filter', ['as' => 'adminDashboardFilter','uses' => 'AdminModule\DashboardController@adminDashboardFilter']);

    // Contact Messages
    Route::get('/admin-contact-messages', ['as' => 'adminContactMessagesView','uses' => 'AdminModule\ContactMessagesController@adminContactMessagesView']);
    Route::get('/admin-contact-messages-filter', ['as' => 'adminContactMessagesFilter','uses' => 'AdminModule\ContactMessagesController@adminContactMessagesFilter']);
    Route::get('/admin-contact-messages-details', ['as' => 'adminContactMessagesDetails','uses' => 'AdminModule\ContactMessagesController@adminContactMessagesDetails']);
    Route::post('/admin-contact-messages-details-save', ['as' => 'adminContactMessagesDetailsSave','uses' => 'AdminModule\ContactMessagesController@adminContactMessagesDetailsSave']);

    // Reports
    Route::get('/admin-reports', ['as' => 'adminReportsView','uses' => 'AdminModule\ReportsController@adminReportsView']);
      // Reports - Donations
      Route::get('/reports-donations', ['as' => 'reportsDonationView','uses' => 'AdminModule\ReportsController@reportsDonationView']);
    
      // Reports- Foods Added
      Route::get('/reports-foodsAdded', ['as' => 'reportsFoodsAddedView','uses' => 'AdminModule\ReportsController@reportsFoodsAddedView']);
    
      // Reports - Causes
      Route::get('/reports-causes', ['as' => 'reportsCausesView','uses' => 'AdminModule\ReportsController@reportsCausesView']);
      Route::get('/reports-causes-details', ['as' => 'reportsCausesDetailsView','uses' => 'AdminModule\ReportsController@reportsCausesDetailsView']);

      // Reports - Volunteers
      Route::get('/reports-volunteers', ['as' => 'reportsVolunteersView','uses' => 'AdminModule\ReportsController@reportsVolunteersView']);
      Route::get('/reports-volunteers-details', ['as' => 'reportsVolunteersDetailsView','uses' => 'AdminModule\ReportsController@reportsVolunteersDetailsView']);
      
      // Reports - Events
      Route::get('/reports-events', ['as' => 'reportsEventsView','uses' => 'AdminModule\ReportsController@reportsEventsView']);
      Route::get('/reports-events-details', ['as' => 'reportsEventsDetailsView','uses' => 'AdminModule\ReportsController@reportsEventsDetailsView']);
      
      // Reports - Contact Messages
      Route::get('/reports-contactmessages', ['as' => 'reportsContactMessagesView','uses' => 'AdminModule\ReportsController@reportsContactMessagesView']);
      Route::get('/reports-contactmessages-details', ['as' => 'reportsContactMessagesDetailsView','uses' => 'AdminModule\ReportsController@reportsContactMessagesDetailsView']);
      
      
    // Permissions
      Route::get('/admin-permissions', ['as' => 'adminPermissionsView','uses' => 'AdminModule\PermissionsController@adminPermissionsView']);
      Route::get('/admin-permissions-save', ['as' => 'adminPermissionsSave','uses' => 'AdminModule\PermissionsController@adminPermissionsSave']);

    // Locations
      Route::get('/admin-locations', ['as' => 'adminLocationsView','uses' => 'AdminModule\LocationsController@adminLocationsView']);
      Route::get('admin-locations-filter', ['as' => 'adminLocationsFilter','uses' => 'AdminModule\LocationsController@adminLocationsFilter']);
      Route::get('/admin-locations-add-view', ['as' => 'adminLocationsAddView','uses' => 'AdminModule\LocationsController@adminLocationsAddView']);
      Route::post('/admin-locations-specific-save', ['as' => 'adminLocationsSpecificSave','uses' => 'AdminModule\LocationsController@adminLocationsSpecificSave']);
      Route::get('/admin-locations-specific-data', ['as' => 'adminLocationsSpecificData','uses' => 'AdminModule\LocationsController@adminLocationsSpecificData']);
      Route::post('/admin-locations-add-save', ['as' => 'adminLocationsAddSave','uses' => 'AdminModule\LocationsController@adminLocationsAddSave']);
    
    // Approvals
    Route::any('/approvalsDecisions', ['as' => 'approvalsDecisions','uses' => 'AdminModule\ApprovalsController@approvalsDecisions']);
    // Approvals-Causes
      Route::get('/approvalsCauses', ['as' => 'approvalsCausesView','uses' => 'AdminModule\ApprovalsController@approvalsCausesView']);
    
    // Approvals-Volunteers
      Route::get('/approvalsVolunteers', ['as' => 'approvalsVolunteersView','uses' => 'AdminModule\ApprovalsController@approvalsVolunteersView']);
      Route::get('/approvalsVolunteerProfile', ['as' => 'approvalsVolunteerProfile','uses' => 'AdminModule\ApprovalsController@approvalsVolunteerProfile']);
    
    // Approvals-Events
      Route::get('/approvalsEvents', ['as' => 'approvalsEventsView','uses' => 'AdminModule\ApprovalsController@approvalsEventsView']);
  
  });

// End: Admin Views
