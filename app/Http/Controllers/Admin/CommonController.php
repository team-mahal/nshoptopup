<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Product;
use App\Invoice;
use App\Shop_details;

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
}
