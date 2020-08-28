<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        if($request->file != $user->file && $request->file != '') {
            $fileName = time().'.'. explode('/', explode(':', substr($request->file, 0, strpos($request->file, ';')))[1])[1];
            \Image::make($request->file)->save(public_path('user/').$fileName);
        }elseif($request->file == ''){
            $fileName = '';
        }
        else{
            $fileName = $user->file;
        }
        // return $file;

        return tap($user)->update(['name' => $name, 'email' => $email, 'phone' => $phone, 'file' => $fileName, 'address' => $address]);
    }
}
