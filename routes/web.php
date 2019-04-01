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




/*
				<a href="home.php">Home</a>
				<a href="map.php">Map</a>
				<a href="add.php">Add</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>

*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/map', 'HomeController@map')->name('map');
Route::get('/add', 'HomeController@add')->name('add');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/place/{id}', 'HomeController@single_place')->name('place');

Route::post('/place_add', 'HomeController@place_add')->name('place_add');
Route::post('/place_review', 'HomeController@place_review')->name('place_review');

Route::get('/admin_review', 'HomeController@admin_review')->name('admin_review');

Route::get('/review/approve/{id}/{userid}', 'HomeController@admin_approve')->name('admin_approve');
Route::get('/review/delete/{id}', 'HomeController@admin_delete')->name('admin_delele');

