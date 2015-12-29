<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller {

	private $category;
	public function __construct(Category $category)
	{
		$this->category = $category;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$category = $this->category->paginate(5);
		return view( 'categories.index', compact( 'category' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( CategoryRequest $request ) {
				$input = $request->all();
				$this->category->fill($input);
				$this->category->save();

				return redirect()->route('admin.categories.index');
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
		$category = $this->category->find($id);
		return view('categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, $id) {
		//
		$this->category->find($id)->update($request->all());
		return redirect()->route('admin.categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		$this->category->find($id)->delete();
		return redirect()->route('admin.categories.index');
	}
}
