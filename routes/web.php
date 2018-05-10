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

/* Page to delete an incident */
Route::get('/incidents/{id}/delete', 'IncidentController@delete');

/* Logic to delete an incident */
Route::delete('/incidents/{id}', 'IncidentController@destroy');

/* View the details of an incident */
Route::get('/updates/{id}', 'UpdateController@show');


