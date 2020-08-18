<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_users = DB::table('users')->count();
        $total_orders = DB::table('orders')->count();
        $today_users = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'))->get()->count();
        $today_orders = DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->get()->count();
        $percentige = $today_users*100/$total_users;
        $percentige_orders = $today_orders*100/$total_orders;
        return view('admin.index')->with(['total_users' => $total_users, 'total_orders' => $total_orders, 'today_users' => $today_users, 'percentige' => $percentige , 'today_orders' => $today_orders, 'percentige_orders' => $percentige_orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
