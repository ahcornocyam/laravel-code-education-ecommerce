<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Tag;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller {

	private $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$product = $this->product->paginate(5);
		return view( 'products.index', compact( 'product' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Category $category) {
		$categories = $category->lists('name','id');
		return view( 'products.create', compact('categories') );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request) {
		$input = $request->all();

		$product= $this->product->fill($input);
		$product->save();
		//$product->tags()->sync( $this->getTagsIds( $request->tags ) );

		return redirect()->route('admin.products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category, $id) {
		//
		$product = $this->product->find($id);
		$categories = $category->lists('name','id');
		return view('products.edit',compact('product','categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductRequest $request, $id) {
		//
		$input = $request->all();
		if (!array_key_exists('featured', $input)) {
            $input['featured'] = 0;
        }
        if (!array_key_exists('recommend', $input)) {
            $input['recommend'] = 0;
        }

		$this->product->find($id)->update($input);
		$product = $this->product->find($id);
		$product->tags()->sync( $this->getTagsIds( $request->tags ) );
		return redirect()->route('admin.products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		$product        = $this->product->find($id);
        $images         = $product->images;
        foreach($images as $image){
            $image->delete();
            if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
                Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
            }
        }
        $product->delete();
		return redirect()->route('admin.products.index');
	}
	
	private function getTagsIds( $tags ){
		$tagList 			= array_filter( array_map( 'trim', explode( ',', $tags ) ) );
		$tagsID 		= [];
		foreach ( $tagList as $tagName ) {
			# code...
			$tagsID[] = Tag::firstOrCreate([ 'name'=> $tagName ])->id;
		}
		return $tagsID;
		}
}
