<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Product;
use App\Prize;
use App\Matchuser;
use App\User;
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
        $prize=Prize::where('match_id',$id)->get();
        return view('admin.setup.matchs.totalplayer', ['player' => $player,'prize'=>$prize ,'id'=>$id]);
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

    public function destroy(Match $match)
    {
        $match->delete();
        return back()
            ->with('success','Match Delete Successfully.');
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

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $match = Match::find($id);
        $amount = $match->entry_fee;
        $match->update(['status' => $status]);
        
        if($status == 'cancel'){

            $matchuser = Matchuser::where('match_id', $id)->get();
            foreach ($matchuser as $key => $val) {
                $user = User::find($val->user_id);
                $wallet = $user->wallet;
                $update_wallet = $wallet + $amount;
                $user->update(['wallet' => $update_wallet]);
            }
        }
        return $status;
    }

    public function playerPrizeUpdate(Request $request)
    {
        $user_id = $request->input('user_id');
        $match_id = $request->input('match_id');
        $total_kill = $request->input('total_kill');
        $lavel = $request->input('lavel');

        $match = Match::find($match_id);
        $matchuser = Matchuser::where('match_id',$match_id)->where('user_id', $user_id)->first();
        $user = User::find($user_id);

        $kill_earn = $total_kill*$match->perkill;
        $old_kill_earn = $matchuser->total_kill*$match->perkill;
        $update_kill_earn = $kill_earn - $old_kill_earn;
        $update_lavel_earn = $lavel - $matchuser->lavel_earn;
        $total_earn = $update_kill_earn + $update_lavel_earn;
        $user_update_wallet = $user->earn_wallet + $total_earn;
        $total_earn_value = $total_earn+$matchuser->total_earn;
        
        $matchuser->update(['lavel_earn' => $lavel, 'total_kill' => $total_kill, 'total_earn' => $total_earn_value]);
        $user->update(['earn_wallet' => $user_update_wallet]);

        echo json_encode('true');
    }
}
