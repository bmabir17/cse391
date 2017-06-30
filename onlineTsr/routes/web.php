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

Auth::routes();

/*
Route::get('/', function () {
    $name='Abir';
    $age=24;
    /*
    $hobbies=[
        'Watch movies',
        'play monopoly',
    ];
    $hobbies=DB::table('tasks')->get(); //Laravel Query builder
    //return $hobbies;
    return view('welcome',compact('name','age','hobbies'));
});
*/

Route::get('/post','PostController@index');
Route::get('/tasks/', 'TasksController@index');
Route::get('/tasks/{id}','TasksController@show');


Route::get('/fileView','fileViewController@index')->name('home');

Route::get('/registration','RegistrationController@create');
Route::post('/registration','RegistrationController@store');

//Route::get('/home','SessionController@index');
Route::get('/','SessionController@index')->name('start');
Route::get('/login',['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');


Route::get('/tsr', function () {
    return view('fileView');
});
