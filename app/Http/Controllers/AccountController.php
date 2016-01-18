<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return null;
    }

    public function orders()
    {
        $categories = Category::all();
        $orders     = Auth::user()->orders()->paginate(5);
        return view('store.orders', compact('categories', 'orders'));
    }
}
