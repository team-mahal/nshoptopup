<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = DB::table('products')->orderBy('id', 'DESC')->get();
       return view('admin.product.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $product = new Product;
        $product->name = $request->input('name');
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

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $product = Product::find($id);
        $name = $request->input('name');

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

       $product->update(['logo' => $filename, 'name' => $name]);
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
