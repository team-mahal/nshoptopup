<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depositeconfig;

class DepositeconfigController extends Controller
{
    public function index()
    {
         $datas = Depositeconfig::orderBy('id', 'asc')->paginate(10);
        return view('admin.setup.depositeconfig.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.depositeconfig.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'percentage_fee' => 'required',
        ]);

        $slider = new Depositeconfig;
        $slider->percentage_fee = $request->percentage_fee;
        $slider->save();

        return back()
        ->with('success','Deposite Config Create Successfully.');
    }

    public function show()
    {
        $datas = Depositeconfig::orderBy('id', 'desc')->first();
        return $datas;
    }

    public function edit(Depositeconfig $depositeconfig)
    {
        return view('admin.setup.depositeconfig.edit', ['depositeconfig' => $depositeconfig]);
    }

    public function update(Request $request, Depositeconfig $depositeconfig)
    {
        $request->validate([
            'percentage_fee' => 'required',
        ]);


       $depositeconfig->update(['percentage_fee' => $request->percentage_fee]);
       return redirect('admin/depositeconfig');
    }

    public function destroy(Depositeconfig $depositeconfig)
    {
        $depositeconfig->delete();
        return back()
            ->with('success','Deposite Config Delete Successfully.');
    }
}
