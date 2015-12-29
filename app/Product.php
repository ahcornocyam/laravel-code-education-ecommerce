<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
		protected  $table       = 'Products';
	 	protected $primarykey   = 'id';
		protected $fillable 		=
		[
			'id',
			'name',
			'description',
			'price',
			'featured',
			'recommend',
		];
}
