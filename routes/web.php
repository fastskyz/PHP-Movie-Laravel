<?php


Route::get('/', 'BrowseController@index')->name('index');
Route::get('/browse/movies', 'BrowseController@movies')->name('movies');
Route::get('/browse/directors', 'BrowseController@directors')->name('directors');
Route::get('/browse/actors', 'BrowseController@actors')->name('actors');

// Routes that need a user to be logged in!

Auth::routes();

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/rate', 'UserController@rate')->name('rate');
Route::post('/user/setrate', 'UserController@setRate')->name('setRate');

Route::get('/user/rate/list', 'UserController@rateList')->name('rateList');


// GET //

// Add
Route::get('/add', 'AddController@index')->name('add');

// Edit
Route::get('/edit/movie/{id}', 'EditController@movie')->name('editMovie');
Route::get('/edit/director/{id}', 'EditController@director')->name('editDirector');
Route::get('/edit/actor/{id}', 'EditController@actor')->name('editActor');

// Delete
Route::get('/delete/movie/{id}', 'DeleteController@movie')->name('delMovie');
Route::get('/delete/director/{id}', 'DeleteController@director')->name('delDirector');
Route::get('/delete/actor/{id}', 'DeleteController@actor')->name('delActor');





// POST //

// Add
Route::post('/add/movie', 'AddController@movie')->name('addMovie');
Route::post('/add/director', 'AddController@director')->name('addDirector');
Route::post('/add/actor', 'AddController@actor')->name('addActor');

// Edit
Route::post('/update/movie/{id}', 'EditController@updateMovie')->name('updateMovie');
Route::post('/update/director/{id}', 'EditController@UpdateDirector')->name('updateDirector');
Route::post('/update/actor/{id}', 'EditController@updateActor')->name('updateActor');
