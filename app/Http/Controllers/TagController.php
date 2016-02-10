<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Tag;
use CodeCommerce\Category;

class TagController extends Controller
{

    private $tag;
    private $categories;

    public function __construct(Tag $tag, Category $categories)
    {
        $this->tag          = $tag;
        $this->categories   = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categories = $this->categories->all();
        $products   = $this->tag->find($id)->products();
        $pFeatured  = $products->featured()->get();
        $pRecommend = $products->recommend()->get();

        return view('store.tag', compact('categories', 'pFeatured', 'pRecommend'));
    }
}
