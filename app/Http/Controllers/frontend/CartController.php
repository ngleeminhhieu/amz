<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    var $pagename = 'CART';
    var $url = 'http://localhost:8000/client';

    function cart(Request $request)
    {
        //$request->session()->forget('cart');
        $cart = session('cart');
        //dd($cart);
        $quantity = 0;
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $quantity++;
            }
        }
        $data = [
            'pagename' => $this->pagename,
            'cart' => $cart,
            'n' => $quantity
        ];
        return view('frontend.system.cart', $data);
    }

    function addtocart(Request $request)
    {
        //dd((int)$request->quantity[1]);
        $product = product::where('id', $request->idProduct)->where('status', '!=', 2)->first();
        if (!$product) {
            return redirect()->route('f.index')->with(['msg' => 'Product is not exsist', 'status' => 'danger']);
        }
        if ($product->quantity < 1) {
            return redirect()->route('f.index')->with(['msg' => 'Product is outstock', 'status' => 'danger']);
        }

        $cart = session('cart');
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantityBuy'] += (int)$request->quantity[1];
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'img' => $product->img,
                'nameProduct' => $product->product_name,
                'price' => $product->price,
                'describeProduct' => $product->product_describe,
                'sale' => $product->sale,
                'priceoffcial' => $product->priceoffcial,
                'quantity' => $product->quantity,
                'quantityBuy' => (int)$request->quantity[1]
            ];
        }
        session(['cart' => $cart]);
        return redirect()->back()->with(['msg' => 'Product is added to yourCart', 'status' => 'success']);
    }

    function addtocart_post(Request $request)
    {
        $product = product::where('id', $request->id)->where('status', '!=', 2)->first();
        if (!$product) {
            return response()->json(['msg' => 'Product is not exsist', 'status' => 'danger'], 200);
        }
        if ($product->quantity < 1) {
            return response()->json(['msg' => 'Product is outstock', 'status' => 'danger'], 200);
        }

        $cart = session('cart');
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantityBuy']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'img' => $product->img,
                'nameProduct' => $product->product_name,
                'price' => $product->price,
                'describeProduct' => $product->product_describe,
                'sale' => $product->sale,
                'priceoffcial' => $product->priceoffcial,
                'quantity' => $product->quantity,
                'quantityBuy' => 1
            ];
        }
        session(['cart' => $cart]);
        $totaloffcial = 0;
        $count = 0;
        foreach ($cart as $id => $item) {
            $totaloffcial += $item['priceoffcial'] * $item['quantityBuy'];
            $count++;
        }
        $data = [
            'msg' => 'Product is added to yourCart',
            'status' => 'success',
            'result' => "Redirect",
            'url' => $this->url,
            'n' => $count,
            'totaloffcial' => $totaloffcial,
            'cart' => $cart
        ];
        return response()->json($data, 200);
    }

    public function removeitem($id)
    {
        $cart = session('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        return redirect()->route('f.cart')->with(['msg' => 'Deleted !', 'status' => 'success']);
    }

    public function removeitem_post(Request $request)
    {
        $cart = session('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
        }
        session(['cart' => $cart]);
        $totaloffcial = 0;
        $count = 0;
        foreach ($cart as $id => $item) {
            $totaloffcial += $item['priceoffcial'] * $item['quantityBuy'];
            $count++;
        }
        $data = [
            'msg' => 'Product is removed from yourCart',
            'status' => 'success',
            'result' => "Redirect",
            'url' => $this->url,
            'n' => $count,
            'totaloffcial' => $totaloffcial
        ];
        return response()->json($data, 200);
    }

    public function updatecart(Request $request)
    {
        $cart = session('cart');
        foreach ($request->quantity as $id => $quantityBuy) {
            if (isset($cart[$id])) {
                $cart[$id]['quantityBuy'] = $quantityBuy;
            }
        }
        session(['cart' => $cart]);
        return redirect()->route('f.cart')->with(['msg' => 'Updated cart successfully', 'status' => 'success']);
    }
}