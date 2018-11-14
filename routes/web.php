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

Route::get('/', function (){
    return view('welcome');
});
Route::get('/about', function (){
    return view('pages.about');
});
Route::get('/contact', function (){
    return view('pages.contact');
});


Route::get('/admin', 'AdminController@index')->name('admin');
Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
route::post('/contact/submit', 'VraagController@submit');
route::resource('post', 'Postcontroller');
//route::get('/search', 'PostController@search');
Route::any('/search',function(){
    $post = Post::get ( 'post' );
    $post = Post::where('name','LIKE','%'.$post.'%');
    if(count($post) > 0)
        return view('welcome')->withDetails($post)->withQuery ( $post );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});
Route::get('show-donateur', 'donateurController@showdonateurToUser')->name('show-donateur');
Route::get('determine-donateur-route', 'donateurController@determinedonateurRoute')->name('determine-donateur-route');
Route::resource('donateur', 'donateurController');
Route::resource('user', 'UserController');





Auth::routes();
route::get('/admin', 'AdminController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
