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
})->middleware('token');

Route::get('/about', function () {
    return 'about';
});
Route::get('/index', function () {
    return 'index';
});
Route::match(['get', 'post'], '/foo', function () {
    return 'This is a request from get or post';
});
Route::any('bar', function () {
    return 'This is a request from any HTTP verb';
});
Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('form_without_csrf_token', function (){
    return '<form method="POST" action="/hello_from_form"><button type="submit">提交</button></form>';
});

Route::get('form_with_csrf_token', function () {
    return '<form method="POST" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::post('hello_from_form', function (){
    return 'hello laravel!';
});
Route::post('home/user', 'Home\UserController@show');
Route::get('home/profile', 'Home\UserController@profile');
Route::get('home/testModel', 'Home\UserController@testModel');
Route::resource('home/posts', 'Home\PostController');
Route::get('home/index', 'Home\UserController@index');
