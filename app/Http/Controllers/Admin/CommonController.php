<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Product;
use App\Order;
use App\User;
use App\Invoice;
use App\Shop_details;
use App\TransactionInfo;
use GuzzleHttp\Client;
use DB;


class CommonController extends Controller
{
    public function getBlog()
    {
        $blog = Blog::latest()->skip(0)->take(3)->get();
        return response()->json($blog, 200);
    }

    public function getSingelBlog($id)
    {
        $blog = Blog::find($id);
        if($blog)
            return response()->json($blog, 200);
        else
            return response()->json('failed', 404);
    }

    public function getAllBlog()
    {
        $blog = Blog::latest()->get();
        return response()->json($blog, 200);
    }

    public function getProduct()
    {
        $product = Product::where('is_shop', 1)->latest()->get();
        return response()->json($product, 200);
    }
    public function getSingelProduct($id)
    {
        $product = Product::where('is_shop', 1)->find($id);
        if($product)
            return response()->json($product, 200);
        else
            return response()->json('failed', 404);
    }

    public function shopStore(Request $request, $total, $user_id)
    {
        $invoice = new Invoice;
        $invoice->total = $total;
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
        
        return response()->json('true', 200);
    }

    public function getInvoicesData($id)
    {
        $invoice = Invoice::where('user_id', $id)->latest()->get();
        if($invoice)
            return response()->json($invoice, 200);
        else
            return response()->json('failed', 404);
    }

    public function getInvoiceDetails($id, $user_id)
    {
        $invoices = DB::table('shop_details')
        ->select('shop_details.*', 'products.name')
        ->join('products', 'products.id', '=', 'shop_details.product_id')
        ->where('invoice_id', $id)
        ->where('user_id', $user_id)
        ->get();
        if($invoices)
            return response()->json($invoices, 200);
        else
            return response()->json('failed', 404);
    }

    public function getOrders($id)
    {
        $order = Order::where('user_id', $id)->latest()->get();
        if($order)
            return response()->json($order, 200);
        else
            return response()->json('failed', 404);
    }

    // bKash trxid

    // public function getTrxidData($trxid, $user_id, $cart_amount)
    // {
    //     $user = User::find($user_id);
    //     $wallet = $user->wallet;

    //     $client = new \GuzzleHttp\Client( ['headers' => [
    //             'Content-Type' => 'application/json'
    //         ]
    //     ]); 
    //     $res = $client->get('https://www.bkashcluster.com:9081/dreamwave/merchant/trxcheck/sendmsg?user=aaaaaaaaaaa&pass=aSe@6PLOIuYGBmc&msisdn=01997980260&trxid='.$trxid);
    //     $data = $res->getBody();
    //     $result = json_decode($data, true);
    //     if($result['transaction']['trxStatus'] == '0000'){
    //         $result['error'] = '0'; 
    //         $transactionInfo = TransactionInfo::where('trxId', $trxid)->get()->count();
    //         if($transactionInfo < 1){
    //             $result['used_code'] = '0';
    //             $transactionInfodata = new TransactionInfo;
    //             $transactionInfodata->trxId = $result['transaction']['trxId'];
    //             $transactionInfodata->sender = $result['transaction']['sender'];
    //             $transactionInfodata->amount = $result['transaction']['amount'];
    //             $transactionInfodata->user_id = $user_id;
    //             $transactionInfodata->save();

    //             $total_update_wallet = $result['transaction']['amount'] + $wallet;

    //             if($cart_amount > $total_update_wallet)
    //             {   
    //                 $update_wallet = $wallet + $result['transaction']['amount'];
    //                 $user->update(['wallet' => $update_wallet]);
    //                 $result['order_success_code'] = '0'; 
                    
    //             }elseif($cart_amount > $result['transaction']['amount'] || $cart_amount == $total_update_wallet){
    //                 $shop_extra_money = (int)$cart_amount - (int)$result['transaction']['amount'];
    //                 $update_wallet = $wallet - $shop_extra_money;
    //                 $user->update(['wallet' => $update_wallet]);
    //                 $result['order_success_code'] = '1'; 

    //             }elseif($cart_amount < $result['transaction']['amount']){
    //                 $over_amount = $result['transaction']['amount'] - $cart_amount;
    //                 $update_wallet = $wallet + $over_amount;
    //                 $user->update(['wallet' => $update_wallet]);
    //                 $result['order_success_code'] = '1';
    //                 $result['extra_money'] = '1';
                    
    //             }else{
    //                 $result['extra_money'] = '0';
    //                 $result['order_success_code'] = '1';
    //             }
    //         }else{
    //             $result['used_code'] = '1'; 
    //         }
    //         echo json_encode($result);
    //     }else{
    //         $result['error'] = '1';
    //         $result['order_success_code'] = '0'; 
    //         $result['used_code'] = '0';
    //         echo json_encode($result);
    //     }
    // }
    
}
