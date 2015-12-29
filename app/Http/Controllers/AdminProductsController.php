<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

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
	public function create() {
		return view('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request) {
		$input = $request->all();

		$this->product->fill($input);

		$this->product->save();

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
	public function edit($id) {
		//
		$product = $this->product->find($id);
		return view('products.edit',compact('product'));
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
		$this->product->find($id)->delete();
		return redirect()->route('admin.products.index');
	}
}
