<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


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
    public function index(Session $session)
    {
        if( !$session::has('cart') )
        {
            $session::put('cart', $this->cart );
        }
        $carrinho = $session::get('cart');

        return view( 'store.cart', compact('carrinho') );
    }

    public function add( $id, Session $session )
    {
        $cart       = $this->getCart($session);
        $product    = $this->product->find($id);

        $cart->add( $id, $product->name, $product->price, $product->images->first() );

        $session::put( 'cart', $cart );

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Session $session)
    {
        //
        $cart       = $this->getCart($session);
        $cart->remove($id);
        $session::put('cart',$cart);

        return redirect()->route('cart.index');
    }

    public function update( $id, Request $request, Session $session )
    {
        $data = $request->all();

        $cart = $session::get('cart');
        $product = $this->product->find($id);
        $cart->update( $id, $product->name, $product->price, $product->images->first(), $data['qtd']);
        if($data['qtd'] == 0 ){
            $cart->remove($id);
        }
        $session::put('cart',$cart);
        return redirect()->route('cart.index');
    }

    private function getCart(Session $session){

        if( $session::has('cart') )
        {
            $cart = $session::get('cart');

        }
        else
        {
            $cart = $this->cart;
        }
        return $cart;
    }
}
