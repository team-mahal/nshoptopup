<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function getProduct()
    {
        $product = Product::where('is_shop', 0)->latest()->get();
        return response()->json($product, 200);
    }

    public function productplayzoon()
    {
        $product = Product::where('is_shop', 2)->latest()->get();
        return response()->json($product, 200);
    }

    public function getSingelProduct($id)
    {
        $product = Product::where('is_shop', 0)->find($id);
        if($product)
            return response()->json($product, 200);
        else
            return response()->json('failed', 404);
    }

    public function index()
    {
        $datas = DB::table('products')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.setup.product.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048',
            'description' => 'required',
        ]);
        $product = new Product;
        $product->description = $request->input('description');
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->tag_line = $request->input('tag_line');
        $product->is_shop = $request->input('is_shop');
        $product->buy_price = $request->input('buy_price');
        $product->sale_price = $request->input('sale_price');
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('product'), $fileName);

            $product->logo = $fileName;
            // $product->file_path = '/storage/' . $filePath;
            $product->save();

            return back()
            ->with('success','Product Create Successfully.')
            ->with('file', $fileName);
        }
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.setup.product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $product = Product::find($id);
        $description = $request->input('description');
        $name = $request->input('name');
        $type = $request->input('type');
        $tag_line = $request->input('tag_line');
        $is_shop = $request->input('is_shop');
        $buy_price = $request->input('buy_price');
        $sale_price = $request->input('sale_price');
        if($request->file('logo') != ''){        
            if($request->hasFile('logo')) {
                $file_path = public_path().'/product/'.$request->input('oldlogo');;
                unlink($file_path);
                $logo = $request->file('logo');
                $filename = time().'.'.$request->file('logo')->extension();  
                $request->file('logo')->move(public_path('product'), $filename);
            }
       }else{
        $filename = $request->input('oldlogo');
       }

       $product->update(['is_shop' => $is_shop, 'buy_price' => $buy_price, 'sale_price' => $sale_price, 'logo' => $filename, 'name' => $name, 'tag_line' => $tag_line, 'description' => $description, 'type' => $type]);
       return back()
            ->with('success','Product Update Successfully.')
            ->with('file', $filename);

    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()
            ->with('success','Product Delete Successfully.');
    }
}
