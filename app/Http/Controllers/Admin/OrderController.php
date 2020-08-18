<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Package;
use App\User;
use DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $id_code_id_password = $request->id_code_id_password;
        $status = $request->status;
        if (empty($user_id) && empty($id_code_id_password) && empty($status)) {
            $datas = Order::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = Order::where('user_id', $user_id)->orWhere('status', $status)->orWhere('email', $id_code_id_password)->paginate(10);
        }
        return view('admin.setup.order.index', ['datas' => $datas]);
    }

    public function store(Request $request, $id, $user_id)
    {
        $type = $request->input('type');
        $email = $request->input('email');
        $password = $request->input('password');

        $packages = Package::where(['id' => $id])->get();
        $order = new Order;
        $order->name = $packages[0]->name;
        $order->buy_price = $packages[0]->buy_price;
        $order->sale_price = $packages[0]->sale_price;
        $order->package_id = $id;
        $order->user_id = $user_id;
        $order->type = $type;
        $order->email = $email;
        $order->password = $password;
        $order->status = 'pandding';
            
        $order->save();
        return response()->json('true', 200);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $order = Order::find($id);
        $sale_price = $order->sale_price;
        $order->update(['status' => $status]);
        $user = User::find($order->user_id);
        $wallet = $user->wallet;
        if($status == 'cancel'){
            $update_wallet = $wallet + $sale_price;
            $user->update(['wallet' => $update_wallet]);
        }
        return $status;
    }
}
