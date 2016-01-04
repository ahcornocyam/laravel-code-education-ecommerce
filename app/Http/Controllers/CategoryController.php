<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class CategoryController extends Controller
{
    
    private $category;

    public function __construct(Category $category ){
        $this->category = $category;
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
        $products   = $category->products();
        $pFeatured  = $products->featured()->get();
        $pRecommend = $products->recommend()->get();
        
        return view('store.category',compact('categories','pFeatured','pRecommend'));
    }
}
