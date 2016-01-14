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
		Route::auth();
		/* Rota de home */
		Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);

		/* Rotas do Carrinho de compras */
		Route::group(['prefix'					=>'cart'],function(){
			Route::get('/',			 	['as'=>'cart.index',	'uses'=> 'CartController@index']);
			Route::get('add/{id}', 		['as'=>'cart.add',		'uses'=> 'CartController@add']);
			Route::get('destory/{id}', 	['as'=>'cart.destroy',	'uses'=> 'CartController@destroy']);
			Route::post('update/{id}', 	['as'=>'cart.update',	'uses'=> 'CartController@update']);
		});
		/* Rota de ordem de serviço*/
		Route::get('checkout/placeorder', ['as'=> 'checkout.place','uses' =>'CheckoutController@place']);
		/* Rota de categorias */
		Route::group(['prefix'					=>'category'],function(){
			Route::get('{id?}',			['as'=>'category.show',	'uses'=> 'CategoryController@show']);
		});
		/* Rota de produtos */
		Route::group(['prefix'					=>'product'],function(){
				Route::get('{id?}',			['as'=>'product.show',	'uses'=> 'ProductController@show']);
		});
		/* Rotas de tags */
		Route::group(['prefix'					=>'tag'],function(){
				Route::get('{id?}',			['as'=>'tag.index',		'uses'=> 'TagController@index']);
		});
		/* Rotas para a area administrativa */
		Route::group(['prefix'					=>'admin','middleware'=>'auth.admin'],function(){

			Route::get('/',['as'=> 'admin.index',function(){
				return view('layouts.app');
			}]);
				//rotas para categorias
			Route::group(['prefix'				=>'categories'],function(){
				Route::get('/',['as'			=>'admin.categories.index','uses'	=>'AdminCategoriesController@index']);
				Route::get('create',['as'		=>'admin.categories.create','uses'	=>'AdminCategoriesController@create']);
				Route::post('/',['as'			=>'admin.categories.store','uses'	=>'AdminCategoriesController@store']);
				Route::get('/{id}/edit',['as'	=>'admin.categories.edit','uses'	=>'AdminCategoriesController@edit']);
				Route::put('/{id}/update',['as'	=>'admin.categories.update','uses'	=>'AdminCategoriesController@update']);
				Route::get('/{id}/destroy',['as'=>'admin.categories.destroy','uses'	=>'AdminCategoriesController@destroy']);
			});
			//rotas para produtos
			Route::group(['prefix'				=>'products'],function(){
				Route::get('/',['as'			=>'admin.products.index','uses'		=>'AdminProductsController@index']);
				Route::get('create',['as'		=>'admin.products.create','uses'	=>'AdminProductsController@create']);
				Route::post('/',['as'			=>'admin.products.store','uses'		=>'AdminProductsController@store']);
				Route::get('/{id}/edit',['as'	=>'admin.products.edit','uses'		=>'AdminProductsController@edit']);
				Route::put('/{id}/update',['as'	=>'admin.products.update','uses'	=>'AdminProductsController@update']);
				Route::get('/{id}/destroy',['as'=>'admin.products.destroy','uses'	=>'AdminProductsController@destroy']);
			});
			//rotas produtos imagem
			Route::group(['prefix'						=>'images'],function($id){
		        Route::get('{id?}/product',['as'		=>'admin.images.index', 'uses'	=>'ProductImageController@index']);
		        Route::get('create/{id?}/product',['as'	=>'admin.images.create', 'uses'	=> 'ProductImageController@create']);
		        Route::post('{id}/product',['as'		=>'admin.images.store', 'uses' 	=>'ProductImageController@store']);
		        Route::get('destroy/{id?}/product',['as'=>'admin.images.destroy', 'uses'=>'ProductImageController@destroy']);
		    });
		});

});
