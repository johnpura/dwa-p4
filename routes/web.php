<?php

/*
|--------------------------------------------------------------------------
| Incidents Routes
|--------------------------------------------------------------------------
*/

/* Home page */
Route::get('/', 'IncidentController@index');

/* Search for an incident */
Route::get('/incidents/search', 'IncidentController@search');

/* Form to create a new incident */
Route::get('/incidents/create', 'IncidentController@create');

/* Logic to add an incident */
Route::post('/incidents/store', 'IncidentController@store');

/* Form to edit an incident */
Route::get('/incidents/{id}/edit', 'IncidentController@edit');

/* Logic to edit an incident */
Route::put('/incidents/{id}', 'IncidentController@update');









/* Delete an incident */
Route::post('/incidents/delete/{incident_id}', 'IncidentController@delete');

/*
|--------------------------------------------------------------------------
| Updates Routes
|--------------------------------------------------------------------------
*/

/* View the details of an incident */
Route::get('/updates/show/{incident_id}', 'UpdateController@show');

/* Create an update post for an incident */
Route::post('/updates/create', 'UpdateController@create');

/* Edit an update post for an incident */
Route::get('/updates/edit', 'UpdateController@edit');

/* Create a new update post for an incident */
Route::get('/updates/delete', 'UpdateController@delete');

