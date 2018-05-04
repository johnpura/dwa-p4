<?php
/*
Route::get('/', function () {
    return view('index');
});
*/

/*
|--------------------------------------------------------------------------
| Incidents Routes
|--------------------------------------------------------------------------
*/

/* Status dashboard */
Route::get('/', 'IncidentController@index');

/* Display all incidents */
Route::get('/incidents/history', 'IncidentController@history');

/* Search for an incident */
Route::get('/incidents/search', 'IncidentController@search');

/* Create a new incident */
Route::post('/incidents/create', 'IncidentController@create');

/* Edit an incident */
Route::post('/incidents/edit', 'IncidentController@edit');

/* Delete an incident */
Route::post('/incidents/delete', 'IncidentController@delete');

/*
|--------------------------------------------------------------------------
| Updates Routes
|--------------------------------------------------------------------------
*/

/* View the details of an incident */
Route::get('/updates/show', 'UpdateController@show');

/* Create a new update for an incident */
Route::get('/updates/create', 'UpdateController@create');

/* Edit an update for an incident */
Route::get('/updates/edit', 'UpdateController@edit');

/* Create a new update for an incident */
Route::get('/updates/delete', 'UpdateController@delete');


/*
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    
    // The following commented out line will print your MySQL credentials.
    // Uncomment this line only if you're facing difficulties connecting to the
    // database and you need to confirm your credentials. When you're done
    // debugging, comment it back out so you don't accidentally leave it
    // running on your production server, making your credentials public.
    
    // #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
*/
