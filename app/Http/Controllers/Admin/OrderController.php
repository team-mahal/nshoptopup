<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $data = DB::table('orders')->orderBy('id', 'DESC')->get();
       return view('admin.setup.order.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        
        $order = new Order;
        $order->name = $request->input('name');
        $order->buy_price = $request->input('buy_price');
        $order->sale_price = $request->input('sale_price');
        $order->package_id = $request->input('package_id');
        $order->status = $request->input('status');
            
        $order->save();

        return back()
        ->with('success','Package Create Successfully.');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $order = Order::find($id);
        $order->update(['status' => $status]);
        return back()
        ->with('success','package Update Successfully.');
    }
}
