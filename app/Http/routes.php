<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
		return view('app');
	});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => ['web']], function () {
		//
	});
Route::resource('admin/categories', 'AdminCategoriesController', [
		'index'   => 'categories.index',
		'create'  => 'categories.create',
		'store'   => 'categories.store',
		'show'    => 'categories.show',
		'edit'    => 'categories.edit',
		'update'  => 'categories.update',
		'destroy' => 'categories.delete',
	]);
Route::resource('admin/products', 'AdminProductsController', [
		'Index'   => 'products.index',
		'Create'  => 'products.create',
		'Store'   => 'products.store',
		'show'    => 'products.show',
		'edit'    => 'products.edit',
		'update'  => 'products.update',
		'destroy' => 'products.delete',
	]);
