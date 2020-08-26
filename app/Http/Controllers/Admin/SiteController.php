<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutPrivacy;

class SiteController extends Controller
{
    public function getPageData($id){
        $aboutPrivacy = AboutPrivacy::where('id', $id)->latest()->get();
        if($aboutPrivacy)
            return response()->json($aboutPrivacy, 200);
        else
            return response()->json('failed', 404);
    }
}
