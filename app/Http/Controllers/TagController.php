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



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
