<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// antony24361@gmail.com 9VCB9VHMcXDFpkC
// cesaradmin 98021131013763

Route::get('/developer',function(){
	return view('developer');
});

Route::get('/','productcontroller@index')->name('index')->middleware('insertip');

Route::get('/search','SearchController@index')->name('search')->middleware('insertip');

Route::get('/check','ordercontroller@index')->name('check')->middleware('insertip');
Route::post('/order-check/form','ordercontroller@check')->name('check.order')->middleware('insertip');
Route::post('/order-check/sub','ordercontroller@checksub')->name('check.order.sub')->middleware('insertip');
Route::post('/check/submit','ordercontroller@submit')->name('check.submit')->middleware('insertip');

Route::get('/check-order', function () { return view('order.form');})->name('check.form')->middleware('insertip');;


Route::get('/product/{name}','productcontroller@show')->name('product.show')->middleware('insertip');

Route::get('/categoria','CategoriController@index')->name('product.parent')->middleware('insertip');
Route::get('/categoria/{tag}','CategoriController@show')->name('categori.show')->middleware('insertip');


// CRUD CART
Route::post('/c','cartcontroller@add')->name('product.add')->middleware('insertip');
Route::get('/gOs35g441/{id}','cartcontroller@addi')->name('product.addi')->middleware('insertip');
Route::get('/wsFf446go/{id}','cartcontroller@remove')->name('product.remove')->middleware('insertip');
// CRUD CART
Route::get('/cart','cartcontroller@show')->name('cart.show')->middleware('insertip');

Route::get('/sobre-nosostros', function () {return view('aboutus');})->middleware('insertip');
Route::get('/contacto', function () {return view('contactme');})->middleware('insertip');
Route::post('/contacto', 'ordercontroller@contact')->name('contact.submit');




// ADMIN
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ','admincontroller@index')->name('admin')->middleware('auth');
Route::post('/ROnYHcir8Vdq64zudoAp6IXfZ/add-categorie','admincontroller@addCategory')->name('add.categoria')->middleware('auth');
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ/remove-categorie','admincontroller@removeCategory')->name('r.categoria')->middleware('auth');


Route::post('/ROnYHcir8Vdq64zudoAp6IXfZ/add-product','productcontroller@add')->name('admin.add.product')->middleware('auth');
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ/remove-product/{id}','productcontroller@remove')->name('admin.remove.product')->middleware('auth');
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ/order/{id}','ordercontroller@show')->name('order.show')->middleware('auth');
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ/order-success/{id}','ordercontroller@success')->name('order.success')->middleware('auth');
Route::get('/ROnYHcir8Vdq64zudoAp6IXfZ/order-failed/{id}','ordercontroller@failed')->name('order.failed')->middleware('auth');


Route::get('/ROnYHcir8V','Auth\LoginController@ShowLoginForm')->name('login')->middleware('insertip');
Route::post('/ROnYHcir8V','Auth\LoginController@login')->middleware('insertip');
Route::post('/oAp6IXfZ','Auth\LoginController@logout')->name('logout')->middleware('insertip');

Route::get('/register','Auth\RegisterController@ShowRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@Register');
// ADMIN



Route::get('/mail',function(){
	return view('mail/order-success');
});


// Auth::routes();
// Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
