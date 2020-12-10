<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    var $url = "http://localhost:8000/client/product";
    public function index()
    {
        $list = product::where('status', '!=', '2')
            ->where('typeProduct', 'fanlight')
            ->paginate(8);

        $listAblum = product::where('status', '!=', '2')
            ->where('typeProduct', 'ablum')
            ->paginate(8);

        $listAccessories = product::where('status', '!=', '2')
            ->where('typeProduct', 'accessories')
            ->paginate(8);

        $listSale = product::where('status', '!=', '2')
            ->where('sale', '>', '0')
            ->paginate(8);
        $cart = session('cart');
        $quantity = 0;
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $quantity++;
            }
        }
        $data = [
            'list' => $list,
            'listablum' => $listAblum,
            'listaccessories' => $listAccessories,
            'listsale' => $listSale,
            'cart' => $cart,
            'n' => $quantity
        ];
        return view('frontend.system.dashboard', $data);
    }

    public function show($id)
    {
        $cart = session('cart');
        $quantity = 0;
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $quantity++;
            }
        }
        $prd = product::where('id', $id)->where('status', '!=', 2)->first();
        $data = [
            'item' => $prd,
            'cart' => $cart,
            'n' => $quantity
        ];
        return view('frontend.system.productDetail', $data);
    }

    public function checkout()
    {
        $cart = session('cart');
        $quantity = 0;
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $quantity++;
            }
        }
        $data = [
            'cart' => $cart,
            'n' => $quantity
        ];
        return view('frontend.system.checkout', $data);
    }

    public function product()
    {
        $list = Product::where('status', '!=', '2')->paginate(6);
        $cart = session('cart');
        $quantity = 0;
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $quantity++;
            }
        }
        $data = [
            'list' => $list,
            'cart' => $cart,
            'n' => $quantity
        ];
        return view('frontend.system.product', $data);
    }
}