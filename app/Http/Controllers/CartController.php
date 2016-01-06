<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;


class CartController extends Controller
{
    private $cart;
    private $product;

    public function __construct( Cart $cart, Product $product )
    {
        $this->cart     = $cart;
        $this->product  = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( !$request->session()->has('cart') )
        {
            $request->session()->put('cart', $this->cart );
        }
        $carrinho = $request->session()->get('cart');

        return view( 'store.cart', compact('carrinho') );
    }

    public function add( $id, Request $request )
    {
        $cart       = $this->getCart($request);
        $product    = $this->product->find($id);

        $cart->add( $id, $product->name, $product->price, $product->images->first() );

        $request->session()->put( 'cart', $cart );

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        $cart       = $this->getCart($request);
        $cart->remove($id);
        $request->session()->put('cart',$cart);

        return redirect()->route('cart.index');
    }

    public function update( $id, Request $request )
    {
        $data = $request->all();

        $cart = $request->session()->get('cart');
        $product = $this->product->find($id);
        $cart->update( $id, $product->name, $product->price, $product->images->first(), $data['qtd']);
        if($data['qtd'] == 0 ){
            $cart->remove($id);
        }
        $request->session()->put('cart',$cart);
        return redirect()->route('cart.index');
    }

    private function getCart(Request $request){

        if( $request->session()->has('cart') )
        {
            $cart = $request->session()->get('cart');

        }
        else
        {
            $cart = $this->cart;
        }
        return $cart;
    }
}
