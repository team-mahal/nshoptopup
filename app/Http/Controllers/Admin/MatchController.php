<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Product;
use App\Prize;
use App\Matchuser;

class MatchController extends Controller
{
     public function index()
    {
        $datas = Match::orderBy('id', 'DESC')->paginate(10);
        return view('admin.setup.matchs.index', ['datas' => $datas]);
    }

    public function create()
    {
        $product=Product::where('is_shop',2)->get();
        return view('admin.setup.matchs.create')->with('product',$product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'map_id' => 'required',
            'start_at' => 'required',
            'start_time' => 'required',
            'match_name' => 'required',
            'type' => 'required',
            'entry_fee' => 'required',
            'perkill' => 'required',
            'max_join' => 'required',
            'min_join' => 'required',
            'total_prize' => 'required',
            'platform' => 'required',
        ]);

        $blog = new Match;
        $blog->product_id = $request->input('product_id');
        $blog->map_id = $request->input('map_id');
        $blog->start_at = $request->input('start_at');
        $blog->start_time = $request->input('start_time');
        $blog->match_name = $request->input('match_name');
        $blog->type = $request->input('type');
        $blog->entry_fee = $request->input('entry_fee');
        $blog->perkill = $request->input('perkill');
        $blog->max_join = $request->input('max_join');
        $blog->min_join = $request->input('min_join');
        $blog->total_prize = $request->input('total_prize');
        $blog->platform = $request->input('platform');

        $blog->save();
        return back()
            ->with('success','Match Create Successfully.');
    }

    public function totalplayer($id)
    {
        $player=Matchuser::where('match_id',$id)->get();
        return view('admin.setup.matchs.totalplayer', ['player' => $player,'id'=>$id]);
    }
    
    public function edit(Match $match)
    {   
        $product=Product::where('is_shop',2)->get();
        return view('admin.setup.matchs.edit', ['match' => $match,'product'=>$product]);
    }


    public function update(Request $request, Match $match)
    {
       
       $request->validate([
            'product_id' => 'required',
            'map_id' => 'required',
            'start_at' => 'required',
            'start_time' => 'required',
            'match_name' => 'required',
            'type' => 'required',
            'entry_fee' => 'required',
            'perkill' => 'required',
            'max_join' => 'required',
            'min_join' => 'required',
            'total_prize' => 'required',
            'platform' => 'required',
        ]); 

        $match->product_id = $request->input('product_id');
        $match->map_id = $request->input('map_id');
        $match->start_at = $request->input('start_at');
        $match->start_time = $request->input('start_time');
        $match->match_name = $request->input('match_name');
        $match->type = $request->input('type');
        $match->entry_fee = $request->input('entry_fee');
        $match->perkill = $request->input('perkill');
        $match->max_join = $request->input('max_join');
        $match->min_join = $request->input('min_join');
        $match->total_prize = $request->input('total_prize');
        $match->platform = $request->input('platform');
        $match->room_id = $request->input('room_id');
        $match->password = $request->input('password');
        $match->update();

        return redirect('admin/match');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()
            ->with('success','Blog Delete Successfully.');
    }

    public function prize($id='')
    {
        $prize=Prize::where('match_id',$id)->get();
        return view('admin.setup.matchs.prize', ['prize' => $prize,'id'=>$id]);
    }

    public function prizecrate($id='')
    {
        $match=Match::find($id);
        return view('admin.setup.matchs.prizecreate', ['match' => $match]);
    }

    public function prizecrate1(Request $request)
    {
        $request->validate([
            'match_id' => 'required',
            'lavel' => 'required',
            'prize' => 'required',
        ]);

        $blog = new Prize;
        $blog->match_id = $request->input('match_id');
        $blog->lavel = $request->input('lavel');
        $blog->prize = $request->input('prize');
        $blog->save();
        return redirect('admin/match/prize/'.$request->input('match_id'));
    }

    public function prizedelete($id)
    {   
        $blog=Prize::find($id);
        $blog->delete();
        return back()
            ->with('success','Prize Delete Successfully.');
    }
}
