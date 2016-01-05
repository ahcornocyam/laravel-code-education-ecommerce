<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class CategoryController extends Controller
{
    
    private $category;
    private $products;

    public function __construct(Category $category, Product $products ){
        $this->category = $category;
        $this->products = $products;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = $this->category->all();
        
        $category   = $this->category->find($id);

        $pFeatured  = $this->products
                           ->ofCategory($id)
                           ->featured()
                           ->get();

        $pRecommend = $this->products
                           ->ofCategory($id)
                           ->recommend()
                           ->get();

        return view('store.category',compact('categories','pFeatured','pRecommend'));
    }
}
