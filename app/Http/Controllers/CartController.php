<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Cart;
use CodeCommerce\Product;


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
    public function index()
    {
        if( !isset($_SESSION['cart']) )
        {
            Session::set('cart', $this->cart );
        }

        return view( 'store.cart', [ 'carrinho'=> Session::get( 'cart' ) ] );
    }

    public function add( $id )
    {
        if( Session::has('cart') )
        {
            $cart = Session::get('cart');

        }else{
            $cart = $this->cart;
        }

        $product = $this->product->find($id);
        $cart->add( $id, $product->name, $product->price );

        Session::set( 'cart', $cart );

        return redirect()->route('cart.index');
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
