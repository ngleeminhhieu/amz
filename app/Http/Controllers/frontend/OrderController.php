<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\detailbill;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        //dd($request->all());
        $cart = session('cart');
        if (!$cart)
            return redirect()->route('f.cart')->with(['msg' => 'YOUR CART IS EMPTY', 'status' => 'danger']);
        //create BILL
        $order = bill::create();
        $order->order_date = now();
        $order->created_at = now();
        $order->updated_at = now();
        $order->status     = 1;
        $order->nameBill = $request->nameCustomer;
        $order->telBill = $request->number;
        $order->emailBill = $request->email;
        $order->deliveryAddress = $request->country_name . ', ' . $request->stateprovince . ', ' . $request->deliveryaddress;
        $order->note = $request->note;
        $order->delivery_fee  = 0;
        $order->payment  = $request->payments;
        if ($order->save()) {
            $total = 0;
            foreach ($cart as $pid => $item) {
                $total += $item['quantityBuy'] * $item['priceoffcial'];
                detailbill::insert([
                    'billID' => $order->id,
                    'productID' => $pid,
                    'quantity' => $item['quantityBuy'],
                    'price' => $item['priceoffcial']
                ]);
                //tru kho
                product::where('id', $pid)->update([
                    'quantity' => $item['quantity'] - $item['quantityBuy']
                ]);
            }
            $order->total = $total;
            $order->save();
            //xoa het session
            //session()->flush();//xoa het
            session()->forget(['cart']); // xoa tung cai
            //tra ve trang thong bao hoan tat don hang và gui mail
            $messageOrder = "YOUR ORDER ID: " . $order->id . "<br>" .
                "Name Bill" . $order->nameBill .  "<br>" .
                "Telephone Bill" . $order->telBill . "<br>" .
                "Delivery Address" . $order->deliveryAddress . "<br>";
            Mail::raw($messageOrder, function ($message) use ($order, $messageOrder) {
                $message->to($order->emailBill, $order->nameBill);
                $message->subject("Thanks for shopping with us");
            });
            // Mail::send('f.completed', $data = ['order' => $order], function ($message) use ($order) {
            //     $message->to($order->emailBill, $order->nameBill);
            // });
            return redirect()->route('f.completed')->with(['order' => $order, 'status' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'YOUR ORDER ISNT CREATE, TRY AGAIN', 'status' => 'danger']);
        }
    }

    public function completed()
    {
        $order  = session('order');
        if (!$order)
            return redirect()->route('f.cart')->with(['msg' => 'YOUR CART IS EMPTY', 'status' => 'danger']);
        $data = [
            'order' => $order
        ];
        return view('frontend.system.completed', $data);
    }
}