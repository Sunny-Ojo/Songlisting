<?php

use App\Song;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $otherSongs = Song::orderBy('created_at', 'desc')->take(3)->get();
    return view('index')->with('song', $otherSongs);
});
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->back();
});
Route::get('/download/{id}', function ($id) {
    $id = Song::find($id);
    return response()->download(public_path('/storage/songs/' . $id->song), $id->name . '.mp3', );
});
Auth::routes();
Route::resource('songs', 'SongsController');
Route::get('/home', function () {
    return redirect('/');
})->name('home');
Route::get('/contact', 'LinksController@contact')->name('contact');
Route::get('/about', 'LinksController@about')->name('about');
Route::get('/search', 'LinksController@search')->name('search');
Route::post('/contact_us', 'LinksController@storeContacts')->name('storecontacts');