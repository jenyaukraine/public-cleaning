<?php

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
    return view('welcome');
});


/*
				<a href="home.php">Home</a>
				<a href="map.php">Map</a>
				<a href="add.php">Add</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>

*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/map', 'HomeController@map')->name('map');
Route::get('/add', 'HomeController@add')->name('add');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/profile1', 'HomeController@profile_places')->name('profile_places');

Route::post('/place_add', 'HomeController@place_add')->name('place_add');