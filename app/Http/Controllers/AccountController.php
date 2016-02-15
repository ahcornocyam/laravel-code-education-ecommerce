<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Endereco;
use CodeCommerce\OrderStatus;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('store.account.index', compact('categories', 'user'));
    }

    public function orders()
    {
        $categories = Category::all();
        $user = Auth::user();
        $orders = Auth::user()->orders()->paginate(5);

        return view('store.account.orders', compact('categories', 'orders', 'user'));
    }
    public function detail()
    {
        $categories = Category::all();
        $user = Auth::user();

        return view('store.account.detail', compact('categories', 'user'));
    }
    public function adress()
    {
        $categories = Category::all();
        $user = Auth::user();
        $enderecos = $user->enderecos()->paginate(5);

        return view('store.account.adress', compact('categories', 'user', 'enderecos'));
    }
    public function adressNew()
    {
        $categories = Category::all();
        $user = Auth::user();

        return view('store.account.createAdress', compact('categories', 'user'));
    }
    public function adressStore(Request $request)
    {
        $endereco = $request->all();
        Auth::user()->enderecos()->create(
            [
                'nome' => $request['nome'],
                'cidade' => $request['cidade'],
                'estado' => $request['estado'],
                'rua' => $request['rua'],
                'bairro' => $request['bairro'],
                'numero'  => $request['numero'],
                'cep' => $request['cep'],
                'user_id' => Auth::user()->id
              ]
        );

        $categories = Category::all();
        $user = Auth::user();
        $enderecos = $user->enderecos()->paginate(5);

        return redirect()->route('account.index', compact('categories', 'user', 'enderecos'));
    }

    public function adressEdit($id)
    {
        $endereco = Auth::user()->enderecos()->find($id);
        $categories = Category::all();
        $user = Auth::user();
        return view('store.account.editAdress', compact('categories', 'user', 'endereco'));
    }

    public function adressUpdate(Request $request, $id)
    {
        $input = $request->all();
        Auth::user()->enderecos()->find($id)->update($input);
        $categories = Category::all();
        $user = Auth::user();
        $enderecos = $user->enderecos()->paginate(5);

        return redirect()->route('account.index', compact('categories', 'user', 'enderecos'));
    }
    public function adressDestroy($id)
    {
        $enderecoRemove = Auth::user()->enderecos()->find($id);
        $enderecoRemove->delete();
        $endereco = Auth::user()->enderecos()->find($id);
        $categories = Category::all();
        $user = Auth::user();
        return redirect()->route('account.index', compact('categories', 'user', 'enderecos'));
    }
}
