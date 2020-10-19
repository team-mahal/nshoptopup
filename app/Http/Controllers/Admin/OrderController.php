<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Package;
use App\User;
use App\PaymentMethod;
use DB;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $order_id = $request->order_id;
        $status = $request->status;
        if (empty($user_id) && empty($order_id) && empty($status)) {
            $datas = Order::with('paymentm')->orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = Order::with('paymentm')->where('user_id', $user_id)->orWhere('status', $status)->orWhere('id', $order_id)->paginate(10);
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
        if($status=='complete'){
            $user = User::find($order->user_id);
            if($user->phone){
                $this->sendmessage($user->phone,$order->id);
            }
        }
        return $status;
    }

    public function walletUpdate(Request $request)
    {
        $id = $request->input('id');
        $amount = $request->input('amount');
        $order = Order::find($id);

        $user = User::find($order->user_id);
        $wallet = $user->wallet;
        $update_wallet = $wallet - $order->refoundamount;
        $user->update(['wallet' => $update_wallet]);
        
        $order->refoundamount=$amount;
        $order->update();


        $user = User::find($order->user_id);
        $wallet = $user->wallet;
        $update_wallet = $wallet + $amount;
        $user->update(['wallet' => $update_wallet]);
        return "success";
    }

    public function savegamename(Request $request)
    {
        $id = $request->input('id');
        $amount = $request->input('amount');
        $order = Order::find($id);
        $order->password=$amount;
        $order->update();
        // $this->sendmessage();
        return "success";
    }


    public function checkPanddingOrder($user_id)
    {
        $datas = Order::where('user_id', $user_id)->Where('status', 'pandding')->count();
        if($datas > 0)
        {
            $data = false;
        }else{
            $data = true;
        }
        return response()->json($data, 200);
    }

    public function gamename(Request $request,$id)
    {
        $data = Order::orderBy('id', 'DESC')->where('email', $id)->where('password','!=','ID Code')->where('type','ID Code')->first();
        return response()->json($data, 200);
    }


    public function sendmessage($number,$orderid)
    {
          $number=substr($number,1);
          $url = "http://msms.putulhost.com/smsapi";
          $data = [
            "api_key" => "C20045365f076fa8c44be2.89586259",
            "type" => "text",
            "contacts" => $number,
            "senderid" => "8809612446000",
            "msg" => "Your Order Id (". $orderid .") Has Been Completed. Happy Top Up WIth NSHOP.",
          ];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          curl_close($ch);
          echo $response;
          return $response;
    }
}
