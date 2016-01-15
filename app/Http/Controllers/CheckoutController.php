<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {
    	if(!Session::has('cart')){
	    	return false;
    	}

    	$cart = Session::get('cart');

    	if( $cart->getTotal() > 0 ){
    		$order = $orderModel->create(
    			[
    				'user_id' 	=> Auth::user()->id,
    				'total' 	=>$cart->getTotal()
    			]);

    		foreach ($cart->all() as $k=>$item) {

    			$order->items()->create([
    					'product_id' 	=> $k,
    					'price' 		=> $item['price'],
    					'qtd'			=> $item['qtd']
    				]);
    		}
            Session::pull('cart','');

            notify()->flash('Concluido','success',[
                'time' => 3000,
                'text' => 'Ordem de pedido Emitido',

            ]);

            return redirect()->route('home');
    	}
        notify()->flash('Falha','warning',[
            'time' => 3000,
            'text' => 'Não há produtos no carrinho',

        ]);
        return redirect()->route('cart.index');
    }
}
