<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use DB;

class PackageController extends Controller
{
    public function getProductWiseDataFind($id)
    {
        $packages = Package::where(['product_id' => $id])->get();
        if($packages)
            return response()->json($packages, 200);
        else
            return response()->json('failed', 404);
    }

    public function index()
    {
        $datas = DB::table('packages')->orderBy('id', 'DESC')->paginate(10);
       return view('admin.setup.package.index', ['datas' => $datas]);
    }

    public function create()
    {
        $product = DB::table('products')->orderBy('id', 'DESC')->get();
        return view('admin.setup.package.create', ['product' => $product]);
    }

    public function store(Request $request)
    {
        
        $package = new Package;
        $package->name = $request->input('name');
        $package->buy_price = $request->input('buy_price');
        $package->sale_price = $request->input('sale_price');
        $package->product_id = $request->input('product_id');
            
        $package->save();

        return back()
        ->with('success','Package Create Successfully.');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $product = DB::table('products')->orderBy('id', 'DESC')->get();
        $package = Package::find($id);
        return view('admin.setup.package.edit', ['package' => $package, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $name = $request->input('name');
        $buy_price = $request->input('buy_price');
        $sale_price = $request->input('sale_price');
        $product_id = $request->input('product_id');
        
       $package->update(['name' => $name, 'buy_price' => $buy_price, 'sale_price' => $sale_price, 'product_id' => $product_id]);
       return back()
       ->with('success','package Update Successfully.');

    }

    public function destroy($id)
    {
        Package::find($id)->delete();
        return back()
            ->with('success','package Delete Successfully.');
    }
}
