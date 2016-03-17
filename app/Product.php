<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
		protected  $table       = 'products';
	 	protected $primarykey   = 'id';
		protected $fillable 		=
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
		public function category()
		{
			return $this->belongsTo('CodeCommerce\Category');
		}

		/*
     * Relacionamento com produtimage
     */
    public function images()
		{
        return $this->hasMany('CodeCommerce\ProductImage');
    }

	/*
	* Relacionmento com tag
	*/
	public function tags(){
		return $this->belongsToMany('CodeCommerce\Tag');
	}
    /*
      Itens ordem de serviço
    */
	public function orderItems()
	{
		return $this->hasMany('CodeCommerce\OrderItem');
	}

	public function getTagsListAttribute(){
			$tagList = $this->tags->lists('name')->all();
			return implode(', ', $tagList);
	}

	public function scopeFeatured($query)
	{
		return $query->where('featured','=', '1');
	}

	public function scopeRecommend($query){
		return $query->where('recommend', '=', '1');
	}

	public function scopeOfCategory($query, $type){
		return $query->where('category_id','=', $type);
	}
}
