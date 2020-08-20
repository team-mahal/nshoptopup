<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Product;

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
}
