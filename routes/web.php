<?php
/**
 * Homepage
 */
Route::get('/', 'BeritasController@welcome');


// Route::get('/', function () {
//     Route::get('/home', 'BeritasController@home');
//     return view('welcome');
// });

/**
 * Scaffolding Authentication
 */
Auth::routes();

/**
 * Homepage
 */
Route::get('/home', 'BeritasController@home');

Route::group(['middleware' => ['auth', 'pengarang']], function() {

    /**
     * Event
     */
    Route::delete('event/gambar/{id}', ['as'=>'event.destroyImage','uses'=>'EventsController@destroyImage']);
    Route::resource('/event', 'EventsController');
    Route::get('/event/{event}/published', 'EventsController@published');
    Route::get('/show.event/{event}', 'EventsController@tengok');


    /**
     * Berita
     */
    Route::resource('/berita', 'BeritasController');
    Route::get('/berita/{berita}/published', 'BeritasController@published');
    Route::get('/show.berita/{berita}', 'BeritasController@tengok');
    Route::delete('/show.berita/delete/{berita}', 'BeritasController@destroy');

    /**
     * Laporan Buletin
     */
    Route::get('/laporan', 'BeritasController@janalaporan');
    Route::get('/laporan_berita', 'BeritasController@showLaporanBerita');
    Route::get('/laporan_acara', 'BeritasController@showLaporanAcara');

    Route::get('/maklumat/email/{berita}', 'BeritasController@notification');
    Route::get('/notifyEvent/{event}', 'EventsController@notify');


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

    /**
     * Category
     */
    Route::get('/category/berita/{category_id}', 'BeritasController@category');
    Route::get('/category/event/{category_id}', 'EventsController@category');

    /**
     * Tetapan Buletin
     */
    Route::get('/tetapan', 'BeritasController@tetapan');


});
