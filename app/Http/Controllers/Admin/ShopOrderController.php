<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;
use App\Shop_details;
use App\User;
use DB;

class ShopOrderController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $order_id = $request->order_id;
        $status = $request->status;
        if (empty($user_id) && empty($order_id) && empty($status)) {
            $datas = Invoice::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = Invoice::where('user_id', $user_id)->orWhere('status', $status)->orWhere('id', $order_id)->paginate(10);
        }
        return view('admin.setup.shopOrder.index', ['datas' => $datas]);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $invoice = Invoice::find($id);
        $sale_price = $invoice->total;
        $invoice->update(['status' => $status]);
        $user = User::find($invoice->user_id);
        $wallet = $user->wallet;
        if($status == 'cancel'){
            $update_wallet = $wallet + $sale_price;
            $user->update(['wallet' => $update_wallet]);
        }
        return $status;

    }

    public function show($id)
    {
        $invoices = Shop_details::with('product')->where('invoice_id', $id)->get();
        return view('admin.setup.shopOrder.show', ['datas' => $invoices]);
    }

    public function findorderdetails(Request $r)
    {
        $details = Shop_details::find($r->id);
        return response()->json($details);
    }

    public function updateorderdetails(Request $r)
    {

        $d = Shop_details::find($r->id);
        $d->details=$r->desc;
        $d->save();
        return response()->json('success');
    }
}
