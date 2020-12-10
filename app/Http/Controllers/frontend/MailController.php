<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function form()
    {
        return view('frontend.system.mail');
    }

    public function contact()
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
        return view('frontend.system.contact', $data);
    }

    function formpost(Request $request)
    {
        //dd($request->all());
        // Mail::raw($request->note, function ($message) use ($request) {
        //     $message->to($request->email, 'John Doe');
        //     $message->subject($request->subject);
        // });
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to($request->email, $request->name);
            $message->from('nguyenleminhhieu.jacky@gmail.com', 'AMz');
            $message->subject($request->subject);
        });
        return redirect()->back()->with(['msg' => 'YourMessage is sended to us.', 'status' => 'success']);;
    }
}