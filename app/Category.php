<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
		protected $table 		 = 'categories';
		protected $primarykey	 = 'id';
		protected $fillable		 = [
				'id',
				'name',
				'description',
		];
		/*
		* Relacionamento com products
		*/
		public function products(){
			return $this->hasMany('CodeCommerce\Product');
		}
}
