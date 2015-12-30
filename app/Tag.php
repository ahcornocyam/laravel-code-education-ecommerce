<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected  $table       = 'tags';
	protected $primarykey   = 'id';
	protected $fillable 	=
	[
		'name'			
	];
    
    /*
	* Relacionmento com produtos
	*/
	public function products(){
		return $this->belongsToMany('CodeCommerce\Product');
	}
    
}
