<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        return response()->json($request->user());
    }


    public function getUser(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $email = $request->email;
        $phone = $request->phone;
        if (empty($user_id) && empty($email) && empty($phone)) {
            $datas = User::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = User::where('id', $user_id)->orWhere('email', $email)->orWhere('phone', $phone)->paginate(10);
        }
        return view('admin.setup.user.index', ['datas' => $datas]);
    }
}
