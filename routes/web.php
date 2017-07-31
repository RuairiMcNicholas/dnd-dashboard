<?php

/*
|--------------------------------------------------------------------	------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/must-login', function () {
    return view('pages.must-login');
});

Route::get('/', 'WelcomeController@welcome');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/dashboard', 'CharacterController@count');



Route::get('/charts', function () {
    return view('pages.charts');
});




Route::get('/rpg', function () {
    return view('pages.rpg');
});




Route::get('/template', function () {
    return view('pages.template');
});


/* Character Views */

use App\Character;


Route::get('/characters', 'CharacterController@index');

Route::get('/deleted-characters', 'CharacterController@deleted');


/* Route::get('/characters/{char_id}', function ($char_id) {

	

	$characters = DB::table('characters')->get()->where('char_id', '==', $char_id);

	//$characters = DB::table('characters')->get();

	dd($characters);
    //return view(compact('characters');
}); */


Route::get('/create-character', 'CharacterController@create');


Route::post('/create-char', 'CharacterController@store');


Route::get('/characters/{char_id}', 'CharacterController@viewCharacter');

Route::get('/characters/delete/{char_delete_id}', 'CharacterController@deleteCharacter');
Route::get('/characters/restore/{char_restore_id}', 'CharacterController@restoreCharacter');
Route::get('/characters/pdelete/{char_pDelete_id}', 'CharacterController@pDeleteCharacter');
Route::get('/characters/edit/{char_id}', 'CharacterController@editCharacter');
Route::get('/characters/print/{char_print_id}', 'CharacterController@printCharacter');


Route::post('/characters/commit_edit/{char_id}', 'CharacterController@commitEdit');





/* Campaign Routes */

Route::get('/campaigns', 'CampaignController@index');



/* Auth Routes */


Route::group(['middleware' => ['web']], function(){
	Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
	Route::get('/handlelogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);

	});

Auth::routes();





