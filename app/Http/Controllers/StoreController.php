<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    private $category;
    private $product;

    public function __construct(Category $category, Product $product){
    	$this->category = $category;
    	$this->product 	= $product;
    }
    public function index(){
    	$categories 	= $this->category->all();
    	$pFeatured 	    = $this->product->featured()->get();
    	$pRecommend 	= $this->product->recommend()->get();
    	
    	return view('store.index',compact('categories','pFeatured','pRecommend'));
    }
}
