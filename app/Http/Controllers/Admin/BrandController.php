<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\brand;
use DB;

class brandController extends Controller
{
    public function index()
    {
        $datas = DB::table('brands')->orderBy('id', 'DESC')->paginate(10);
       return view('admin.setup.brand.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $brand = new Brand;
        $brand->name = $request->input('name');
            if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('brand'), $fileName);

            $brand->logo = $fileName;
            // $product->file_path = '/storage/' . $filePath;
            $brand->save();

            return back()
            ->with('success','Brand Create Successfully.')
            ->with('file', $fileName);
        }
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.setup.brand.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $brand = Brand::find($id);
        $name = $request->input('name');

        if($request->file('logo') != ''){        
            if($request->hasFile('logo')) {
                $file_path = public_path().'/brand/'.$request->input('oldlogo');;
                unlink($file_path);
                $logo = $request->file('logo');
                $filename = time().'.'.$request->file('logo')->extension();  
                $request->file('logo')->move(public_path('brand'), $filename);
            }
       }else{
        $filename = $request->input('oldlogo');
       }

       $brand->update(['logo' => $filename, 'name' => $name]);
       return back()
            ->with('success','Brand Update Successfully.')
            ->with('file', $filename);

    }

    public function destroy($id)
    {
        Brand::find($id)->delete();
        return back()
            ->with('success','Brand Delete Successfully.');
    }
}
