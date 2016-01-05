<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Category;

class ProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category){
        $this->product  = $product;
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
        $product =  $this->product->find($id);
        return view('store.product',compact('categories','product'));
    }
}
