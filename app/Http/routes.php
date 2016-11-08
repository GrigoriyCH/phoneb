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
/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
Route::get('/',['uses'=>'MainController@gohome','as'=>'home']);
Route::get('/file',['uses'=>'MainController@gofile','as'=>'file']);
Route::get('/edit',['uses'=>'MainController@goedit','as'=>'edit']);
Route::get('/find',['uses'=>'MainController@gofind','as'=>'find']);
Route::get('/edit/add',['uses'=>'MainController@goadd','as'=>'add']);
Route::get('/edit/editor',['uses'=>'MainController@goeditor','as'=>'editor']);
Route::get('/edit/deletor',['uses'=>'MainController@godeletor','as'=>'deletor']);
Route::get('/sendkontakt',['uses'=>'MainController@gokontakt','as'=>'kontakt']);
Route::get('/import',['uses'=>'MainController@goimport','as'=>'import']);
Route::get('/export',['uses'=>'MainController@goexport','as'=>'export']);