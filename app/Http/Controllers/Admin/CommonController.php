<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Product;
use App\Order;
use App\Invoice;
use App\Shop_details;
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
        ->select('*')
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
    
}
