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
use App\TransactionInfo;
use App\Slider;
use App\WalletInfo;
use App\WithdrawInfo;
use App\Websiteinfo;


use smasif\ShurjopayLaravelPackage\ShurjopayService;

use App\PaymentMethod;

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
                $shop_details->quantity = $value['quantity'];$invoice->quantity;
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


    public function ProductOrderWithTransactionId(Request $request, $id, $user_id)
    {

        $paymentMethod=$request->input('method');

        if($paymentMethod==100000){

            $shurjopay_service = new ShurjopayService(); 

            $tx_id = $shurjopay_service->generateTxId();

            $success_route = route('paymetsuccess');

            $packages = Package::find($id);
            $user = User::find($user_id);
            $wallet = $user->wallet;
            $data1 = [];

            $datas = Order::where('user_id', $user_id)->Where('status', 'pandding')->count();

            $data1['success'] = 1;
            $type = $request->input('type');
            $email = $request->input('email');
            $password = $request->input('password');

            $order = new Order;
            $order->name = $packages->name;
            $order->buy_price = $packages->buy_price;
            $order->sale_price = $packages->sale_price;
            $order->package_id = $id;
            $order->user_id = $user_id;
            $order->type = $type;
            $order->email = $email;
            $order->password = $password;
            $order->status = 'pandding';
            $order->payment = 'waiting';
            $order->payment_number = $request->input('number');
            $order->payment_method = $paymentMethod;
            $order->transaction_id = $tx_id;
            $order->save();

            return $shurjopay_service->sendPayment($packages->sale_price,$success_route);

        }else{

            $packages = Package::find($id);
            $user = User::find($user_id);
            $wallet = $user->wallet;
            $data1 = [];


            $datas = Order::where('user_id', $user_id)->Where('status', 'pandding')->count();
            if($datas > 0)
            {
                $data1['success'] = 0;
                $data1['message'] = "You Have A Pending Order Please Complete Before Make Another Order.";
                return response()->json($data1, 200);
            }else{
                if($paymentMethod==0){
                    if($wallet >= $packages->sale_price){
                        $update_wallet = $wallet - $packages->sale_price;
                        $user->update(['wallet' => $update_wallet]);
                        $data1['success'] = 1;
                        $data1['wallet'] = $update_wallet;
                        $type = $request->input('type');
                        $email = $request->input('email');
                        $password = $request->input('password');

                        $order = new Order;
                        $order->name = $packages->name;
                        $order->buy_price = $packages->buy_price;
                        $order->sale_price = $packages->sale_price;
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
                }else{

                    $data1['success'] = 1;
                    $type = $request->input('type');
                    $email = $request->input('email');
                    $password = $request->input('password');

                    $pm=PaymentMethod::find($paymentMethod);
                    $price=0;
                    if($pm->discount>0){
                        $p=($packages->sale_price*$pm->discount)/100;
                        $price=$packages->sale_price-$p;
                    }else{
                        $price=$packages->sale_price;
                    }


                    $order = new Order;
                    $order->name = $packages->name;
                    $order->buy_price = $packages->buy_price;
                    $order->sale_price = $price;
                    $order->package_id = $id;
                    $order->user_id = $user_id;
                    $order->type = $type;
                    $order->email = $email;
                    $order->password = $password;
                    $order->status = 'pandding';
                    $order->payment_number = $request->input('number');
                    $order->payment_method = $paymentMethod;
                    $order->transaction_id = $request->input('transaction_id');
                    $order->save();
                    return response()->json($data1, 200);
                }
            }
        }
    }

    public function paymetsuccess(Request $request)
    {
        $order = Order::where('transaction_id', $request->tx_id)->Where('status', 'pandding')->first();
        if($request->status=='Success'){
            $order->payment = 'completed';
            $order->update();
        }else{
            $order->status = 'cancel';
            $order->payment = 'cancel';
            $order->update();
        }
        return redirect('/my-orders'); 
    }

    public function getTransactions($id)
    {
        $transactionInfo = TransactionInfo::where('user_id', $id)->get();
        if($transactionInfo)
            return response()->json($transactionInfo, 200);
        else
            return response()->json('failed', 404);
    }

    public function getSlider()
    {
        $slider = Slider::get();
        return response()->json($slider, 200);
    }

    public function addWallet(Request $request, $id)
    {

        $shurjopay_service = new ShurjopayService(); 

        $tx_id = $shurjopay_service->generateTxId();

        $success_route = route('addpaymentsuccess');

        $walletInfo = new WalletInfo;
        $walletInfo->user_id = $id;
        $walletInfo->paymentMethod = 0;
        $walletInfo->transactionid = $tx_id;
        $walletInfo->paymentNumber = 0;
        $walletInfo->amount = $request->amount;
        $walletInfo->status = 'pandding';
        $walletInfo->save();
        return $shurjopay_service->sendPayment($request->amount,$success_route);
       
    }

    public function addpaymentsuccess(Request $request)
    {
        
        $order = WalletInfo::where('transactionid', $request->tx_id)->Where('status', 'pandding')->first();
        if($request->status=='Success'){

            $user = User::find($order->user_id);
            $user->wallet=$user->wallet+$order->amount;
            $user->update();
            

            $order->status = 'completed';
            $order->update();

        }else{
            $order->status = 'cancel';
            $order->update();
        }

        return redirect('/my-wallet'); 

    }

    public function withdrawWallet(Request $request, $id)
    {
        $user_data = User::find($id);
        $amount = (int)($request->amount);
        if($user_data->earn_wallet < $amount ){
            return response()->json('false', 404);
        }else{
            $withdrawInfo = new WithdrawInfo;
            $withdrawInfo->user_id = $id;
            $withdrawInfo->paymentMethod = $request->paymentMethod;
            $withdrawInfo->receiverNumber = $request->paymentNumber;
            $withdrawInfo->amount = $amount;
            $withdrawInfo->status = 'pandding';
            $withdrawInfo->save();
            return response()->json('true', 200);
        }
    }

    public function getPaymentMethod()
    {
        $paymentMethod = PaymentMethod::get();
        return response()->json($paymentMethod, 200);
    }


    public function getWebsiteInfo()
    {
        $websiteinfo = Websiteinfo::find(1);
        return response()->json($websiteinfo, 200);
    }

}
