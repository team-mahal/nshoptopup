<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

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
}
