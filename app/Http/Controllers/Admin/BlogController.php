<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $datas = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('admin.setup.blog.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.setup.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048',
            'description' => 'required'
            ]);
        $blog = new Blog;
        $blog->description = $request->input('description');
        $blog->title = $request->input('title');
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time().'.'.$request->file('logo')->extension();  
            $request->file('logo')->move(public_path('blog'), $fileName);

            $blog->logo = $fileName;
            $blog->save();

            return back()
            ->with('success','Blog Create Successfully.')
            ->with('file', $fileName);
        }
    }
    
    public function edit(Blog $blog)
    {
        return view('admin.setup.blog.edit', ['blog' => $blog]);
    }


    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'logo' => 'mimes:jpeg,png,jpg,txt,xlx,xls,pdf|max:2048',
            'description' => 'required'
            ]);
        $description = $request->input('description');
        $title = $request->input('title');

        if($request->file('logo') != ''){        
            if($request->hasFile('logo')) {
                $file_path = public_path().'/blog/'.$request->input('oldlogo');;
                unlink($file_path);
                $logo = $request->file('logo');
                $filename = time().'.'.$request->file('logo')->extension();  
                $request->file('logo')->move(public_path('blog'), $filename);
            }
       }else{
        $filename = $request->input('oldlogo');
       }

       $blog->update(['logo' => $filename, 'title' => $title, 'description' => $description]);
       return redirect('admin/blog');
        // return redirect('admin/blog')->back()
            // ->with('success','Blog Update Successfully.')
            // ->with('file', $filename);

    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()
            ->with('success','Blog Delete Successfully.');
    }
}