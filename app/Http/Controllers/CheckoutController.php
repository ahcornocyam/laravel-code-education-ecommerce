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
            $order = $orderModel->create(
                [
                    'user_id'     => Auth::user()->id,
                    'total'       => $cart->getTotal()
                ]
            );
            $checkout =  $checkoutService->createCheckoutBuilder();

            foreach ($cart->all() as $k => $item) {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ',')));
                $order->items()->create([
                        'product_id' => $k,
                        'price'      => $item['price'],
                        'qtd'        => $item['qtd']
                    ]);
            }

            $cart->clear();
            event(new \CodeCommerce\Events\CheckoutEvent(Auth::user(), $order));
            Session::put('orderId', $order->id);
            $response= $checkoutService->checkout($checkout->getCheckout());
            return redirect($response->getRedirectionUrl());
        }
        return view('store.checkout', ['cart'=>'empty','categories'=>$categories]);
    }

    public function returnCheckout(Locator $locator, Request $request, Order $orderModel)
    {
        $transactionCode = $request->get('id_pagseguro');
        $transaction = $locator->getByCode($transactionCode);

        $orderId = Session::get('orderId');

        $orders  = Auth::user()->orders();
        $orders->find($orderId)->update([
          'id_pagseguro' => $transactionCode,
          'status' => $transaction->getDetails()->getStatus()
        ]);
        $orderId = null;
        return redirect()->route('home');
    }

    public function status(Locator $locator, Request $request, Order $orderModel)
    {
        dd($request->all());
        $transactionCode = $request->get('id_pagseguro');
        $transaction = $locator->getByCode($transactionCode);

        $orderId = Session::get('orderId');

        $orders  = Auth::user()->orders();
        $orders->find($orderId)->update([
          'status' => $transaction->getDetails()->getStatus()
        ]);
        $orderId = null;
    }
}
