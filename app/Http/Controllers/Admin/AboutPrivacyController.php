<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutPrivacy;
use \stdClass;

class AboutPrivacyController extends Controller
{
    public function index()
    {
        $datas = AboutPrivacy::orderBy('id', 'asc')->paginate(10);
        return view('admin.setup.aboutprivacy.index', ['datas' => $datas]);
    }

    
    public function edit($id)
    {
        $aboutPrivacy = AboutPrivacy::find($id);
        return view('admin.setup.aboutprivacy.edit', ['aboutPrivacy' => $aboutPrivacy]);
    }


    public function update(Request $request, AboutPrivacy $aboutprivacy)
    {
        $request->validate([
            'content' => 'required',
            'title' => 'required'
            ]);
        $content = $request->input('content');
        $title = $request->input('title');

       $aboutprivacy->update(['title' => $title, 'content' => $content]);
       return redirect('admin/aboutprivacy');
    }

    public function imagesUpload(Request $request)
    {
        // $allowedExts = array('gif', 'jpeg', 'jpg', 'png');
        // $temp = explode(".", $_FILES["image_param"]["name"]);
        // $extension = end($temp);
        $business_name = time().'.'.$request->file('image_param')->extension();  

        // $business_name = sha1(microtime()). '.' . $extension;
        // move_uploaded_file($_FILES['image_param']['tmp_name'], getcwd(). "/uploads/cms_images/". $business_name);
        $request->file('image_param')->move(public_path('uploads'), $business_name);

        $response =  new \stdClass();
        $response->link = "/uploads/".$business_name;

        echo stripslashes(json_encode($response));
    }
}
