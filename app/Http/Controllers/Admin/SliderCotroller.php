<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;

class SliderCotroller extends Controller
{
    public function index()
    {
        $datas = Slider::orderBy('id', 'asc')->paginate(10);
        return view('admin.setup.slider.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
        $slider = new Slider;
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('slider'), $fileName);

            $slider->logo = $fileName;
            $slider->save();

            return back()
            ->with('success','Slider Create Successfully.')
            ->with('file', $fileName);
        }
    }
    
    public function edit(Slider $slider)
    {
        return view('admin.setup.slider.edit', ['slider' => $slider]);
    }


    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('logo')) {
            $file_path = public_path().'/slider/'.$request->logo;
            if(is_file($file_path)){
                unlink($file_path);
            }
            $logo = $request->file('logo');
            $filename = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('slider'), $filename);
       }else{
        $filename = $request->logo;
       }

       $slider->update(['logo' => $filename]);
       return redirect('admin/slider');

    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back()
            ->with('success','Slider Delete Successfully.');
    }
}
