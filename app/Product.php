<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
		protected  $table       = 'products';
	 	protected $primarykey   = 'id';
		protected $fillable 	=
		[
			'category_id',
			'id',
			'name',
			'description',
			'price',
			'featured',
			'recommend',			
		];
		
		/*
		* Relacionamento com categories
		*/
		public function category(){
			return $this->belongsTo('CodeCommerce\Category');
		}	
		
		/*
     * Relacionamento com produtimage
     */
    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }		
}
