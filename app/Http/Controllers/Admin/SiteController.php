<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutPrivacy;
use App\User;
use App\Invoice;
use App\Shop_details;
use App\Order;
use App\Package;

class SiteController extends Controller
{
    public function getPageData($id){
        $aboutPrivacy = AboutPrivacy::find($id);
        if($aboutPrivacy)
            return response()->json($aboutPrivacy, 200);
        else
            return response()->json('failed', 404);
    }

    public function orderWithWallet(Request $request, $user_id, $cart_amount)
    {
        $user = User::find($user_id);
        $wallet = $user->wallet;
        $data1 = [];
        if($wallet >= $cart_amount){

            $update_wallet = $wallet - $cart_amount;
            $user->update(['wallet' => $update_wallet]);

            $data1['success'] = 1;
            $data1['wallet'] = $update_wallet;
            $invoice = new Invoice;
            $invoice->total = $cart_amount;
            $invoice->user_id = $user_id;
            $invoice->save();
            $invoice->id;

            $data = $request->all();
            foreach($data as $value) {
                $shop_details = new Shop_details;
                $shop_details->product_id = $value['id'];
                $shop_details->user_id = $user_id;
                $shop_details->buy_price = $value['buy_price'];
                $shop_details->sale_price = $value['sale_price'];
                $shop_details->invoice_id = $invoice->id;
                $shop_details->quantity = $value['quantity'];
                $shop_details->save();
            }
        }else{
            $data1['success'] = 0;
        }
        return response()->json($data1, 200);
    }


    public function ProductOrderWithWallet(Request $request, $id, $user_id)
    {
        $packages = Package::where(['id' => $id])->get();
        $user = User::find($user_id);
        $wallet = $user->wallet;
        $data1 = [];
        if($wallet >= $packages[0]->sale_price){
            $update_wallet = $wallet - $packages[0]->sale_price;
            $user->update(['wallet' => $update_wallet]);

            $data1['success'] = 1;
            $data1['wallet'] = $update_wallet;
            $type = $request->input('type');
            $email = $request->input('email');
            $password = $request->input('password');

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
        }else{
            $data1['success'] = 0;
        }
        return response()->json($data1, 200);
    }
}
