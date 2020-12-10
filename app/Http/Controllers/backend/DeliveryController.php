<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{
    var $route = 'delivery';
    var $pagename = 'DELIVERY';
    public function index()
    {
        $list = bill::where('status', '!=', '2')->paginate(5);
        $data = [
            'list' => $list,
            'pagename' => $this->pagename,
            'route' => $this->route
        ];
        return view('backend.delivery.list', $data);
    }

    public function updateOrder($id)
    {
        $item = bill::where('status', '!=', '2')->first();
        $data = [
            'pagename' => $this->pagename,
            'route' => $this->route,
            'title' => 'UPDATE',
            'action' => route('b.updated_deliverypost', $id),
            'method' => 'PUT',
            'item' => $item
        ];
        return view('backend.delivery.form', $data);
    }

    public function updateOrderPost(Request $request, $id)
    {
        $item = bill::where('id', $id)->where('status', '!=', 2)->first();
        //dd($item);
        if (!$item)
            return redirect()->route('b.delivery')->with(['msg' => 'YOUR ORDER IS NOT EXSIST', 'status' => 'danger']);

        $messageOrder = "YOUR ORDER ID: " . $item->id . "<br>" .
            "Name Bill" . $item->nameBill .  "<br>" .
            "Telephone Bill" . $item->telBill . "<br>" .
            "Delivery Address" . $item->deliveryAddress . "<br>" . "YOUR statusOrder=" . $request->statusOrder;
        Mail::raw($messageOrder, function ($message) use ($item, $messageOrder) {
            $message->to($item->emailBill, $item->nameBill);
            $message->subject("Thanks for shopping with us");
        });
        if ($request->statusOrder == "Completed") {
            bill::where('id', $id)->update([
                'statusOrder' => $request->statusOrder,
                'delivery_date' => now()
            ]);
        } else {
            bill::where('id', $id)->update([
                'statusOrder' => $request->statusOrder,
            ]);
        }
        return redirect()->route('b.delivery')->with(['msg' => 'YOUR ORDER IS CHANGED STATUSORDER', 'status' => 'success']);
    }
}