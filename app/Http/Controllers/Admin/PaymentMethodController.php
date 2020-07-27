<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentMethod;
use DB;


class PaymentMethodController extends Controller
{
    public function index()
    {
        $datas = DB::table('payment_methods')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.setup.paymentMethod.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.paymentMethod.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $paymentMethod = new paymentMethod;
        $paymentMethod->name = $request->input('name');
        $paymentMethod->number = $request->input('number');
            if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('paymentMethod'), $fileName);

            $paymentMethod->logo = $fileName;
            $paymentMethod->save();

            return back()
            ->with('success','Payment Method Create Successfully.')
            ->with('file', $fileName);
        }
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $paymentMethod = paymentMethod::find($id);
        return view('admin.setup.paymentMethod.edit', ['paymentMethod' => $paymentMethod]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048'
            ]);
        $paymentMethod = paymentMethod::find($id);
        $name = $request->input('name');

        if($request->file('logo') != ''){        
            if($request->hasFile('logo')) {
                $file_path = public_path().'/paymentMethod/'.$request->input('oldlogo');;
                unlink($file_path);
                $logo = $request->file('logo');
                $filename = time().'.'.$request->file('logo')->extension();  
                $request->file('logo')->move(public_path('paymentMethod'), $filename);
            }
       }else{
        $filename = $request->input('oldlogo');
       }

       $paymentMethod->update(['logo' => $filename, 'name' => $name]);
       return back()
            ->with('success','Payment Method Update Successfully.')
            ->with('file', $filename);

    }

    public function destroy($id)
    {
        paymentMethod::find($id)->delete();
        return back()
            ->with('success','Payment Method Delete Successfully.');
    }
}
