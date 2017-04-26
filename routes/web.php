<?php
/**
 * Homepage
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Scaffolding Authentication
 */
Auth::routes();

/**
 * Homepage
 */
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth', 'pengarang']], function() {

    /**
     * Event
     */
    Route::delete('event/gambar/{id}', ['as'=>'event.destroyImage','uses'=>'EventsController@destroyImage']);
    Route::resource('/event', 'EventsController');

    /**
     * Berita
     */
    Route::resource('/berita', 'BeritasController');

});

Route::group(['middleware' => ['auth', 'pembaca']], function() {

    /**
     * Pembaca
     */
    Route::get('/pembaca', 'HomeController@pembaca');

});

Route::group(['before' => 'pengarang|pembaca'], function() {

    /**
     * Paparan Berita
     */
    Route::get('/papar', 'BeritasController@papar');
    Route::get('/papar/{berita}', 'BeritasController@show');

    /**
     * Paparan Acara
     */
    Route::get('/acara', 'EventsController@papar');
    Route::get('/acara/{event}', 'EventsController@show');

    /**
     * Profile Pembaca
     */
    Route::get('/profile', 'ProfilesController@index');
    Route::get('/profile/edit', 'ProfilesController@edit')->name('edit');
    Route::patch('/profile', 'ProfilesController@update')->name('profile.update');
   // Route::resource('profile', 'ProfilesController');


});
