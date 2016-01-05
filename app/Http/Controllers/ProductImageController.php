<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\ProductImage;
use CodeCommerce\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    private $image;
    private $product;
    public function __construct(Product $product, ProductImage $image )
    {
        $this->product  = $product;
        $this->image    = $image;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->product->find( $id );
        
        return view('admin.images.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->product->find($id);
        return view('admin.images.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductImageRequest $request, $id )
    {
        $file       = $request->file('image');        
        $extension  = $file->getClientOriginalExtension();
        $image      = $this->image->create(['product_id'=>$id , 'extension' => $extension]);
        Storage::disk('local_public')->put($image->id.'.'.$extension,File::get($file));
        return redirect()->route('admin.images.index',$id );
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
        $image      = $this->image->find($id);
        $product    = $image->product_id;
        
        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
        }
        $image->delete();
        return redirect()->route('admin.images.index',$product );
    }
}
