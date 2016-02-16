<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;

use CodeCommerce\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Items\Item;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(CheckoutService $checkoutService, Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }
        $categories = Category::all();
        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {

            $checkout =  $checkoutService->createCheckoutBuilder();

            foreach ($cart->all() as $k => $item) {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ','), $item['qtd']));
            }

            event(new \CodeCommerce\Events\CheckoutEvent(Auth::user()));

            $response= $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());
        }
        return view('store.checkout', ['cart'=>'empty','categories'=>$categories]);
    }

    public function end(Locator $locator, Request $request, Order $orderModel)
    {

        if (!Session::has('cart')) {
            return "Sessão inexistente";
        }
        $cart = Session::get('cart');

        $transaction_code = $request->get('id_pagseguro');

        $transaction  = $locator->getByCode($transaction_code);
        $status = $transaction->getDetails()->getStatus();
        $payment_type = $transaction->getPayment()->getPaymentMethod()->getType();
        $netAmount = $transaction->getPayment()->getNetAmount();

        $order = $orderModel->create([
            'user_id'=>Auth::user()->id,
            'total'=>$cart->getTotal(),
            'status_id'=>$status,
            'transaction_code'=>$transaction_code,
            'payment_type_id'=>$payment_type,
            'netAmount'=>$netAmount,
        ]);
        foreach ($cart->all() as $k => $item) {
            $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
        }

        $cart->clear();

        return redirect()->route('home');
    }
}
