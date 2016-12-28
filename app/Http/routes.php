<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('roles',function(){

$user=App\User::find(1);

return $user->role;
});



// Route::get('/admin',function(){


// return view('admin.index');
// });

Route::group(['middleware'=>'admin'],function(){

Route::resource('admin/user','AdminUserController');
Route::resource('admin/post','AdminPostController');

});

Route::get('test/',function(){
	return "delete";
});