<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawInfo;
use App\User;
use DB;

class WithdrawInfoController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $transaction_id = $request->transaction_id;
        $status = $request->status;
        if (empty($user_id) && empty($transaction_id) && empty($status)) {
            $datas = WithdrawInfo::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = WithdrawInfo::orderBy('id', 'DESC')->where('user_id', $user_id)->orWhere('status', $status)->orWhere('id', $transaction_id)->paginate(10);
        }
        return view('admin.setup.withdrawInfo.index', ['datas' => $datas]);
    }

    public function update(Request $request)
    {
        $status = $request->input('status');
        $datas = ['status' => $status];

        $id = $request->input('id');
        $wallet_data = WithdrawInfo::find($id);
        $user = User::find($wallet_data->user_id);
        $amount = $wallet_data->amount;
        if($user->earn_wallet < $amount){
            $datas['res'] =  false;
        }else{
            $datas['res'] =  true;
            $wallet_data->update(['status' => $status]);
            $wallet = $user->earn_wallet;
            if($status == 'complete'){
                $update_wallet = $wallet - $amount;
                $user->update(['earn_wallet' => $update_wallet]);
            }
        }
        return $datas;
    }

    public function getWithdraw($id)
    {
        $withdrawInfo = WithdrawInfo::orderBy('id', 'DESC')->where('user_id', $id)->get();
        if($withdrawInfo)
            return response()->json($withdrawInfo, 200);
        else
            return response()->json('failed', 404);
    }
}
