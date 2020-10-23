<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Websiteinfo;

class WebsiteinfoController extends Controller
{
    public function index()
    {
        $data = Websiteinfo::find(1);
        return view('admin.setup.websiteinfo.index', ['data' => $data]);
    }

    
    public function edit(Websiteinfo $websiteinfo)
    {
        return view('admin.setup.websiteinfo.edit', ['websiteinfo' => $websiteinfo]);
    }


    public function update(Request $request, Websiteinfo $websiteinfo)
    {
        $fb       = $request->input('fb');
        $youtube  = $request->input('youtube');
        $email    = $request->input('email');
        $phone    = $request->input('phone');

       $websiteinfo->update(['fb' => $fb, 'youtube' => $youtube, 'email' => $email, 'phone' => $phone]);
       return redirect('admin/websiteinfo');
    }
}
