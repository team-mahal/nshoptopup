<?php

namespace App\Http\Controllers;

use App\Match;
use App\User;
use App\Matchuser;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status,$id)
    {
        $data = Match::with('product')->with('prizes')->with('users')->where('status',$status)->where('product_id',$id)->get();
        return $data;
    }

    public function singlematch($id='')
    {
        $data = Match::with('product')->with('prizes')->with('users')->find($id);
        return $data;
    }

    public function join(Request $request,$id)
    {

        $type = $request->input('type');
        $totalfee = $request->input('fee');
        $user_id=$request->input('user_id');
        $match_id=$request->input('match_id');

        $matchuser= Matchuser::where('match_id',$match_id)->count();

        $match = Match::where('id',$match_id)->first();

        if($type=='solo'){
            $matchuser=$matchuser;
        }else if($type=='duo'){
            $matchuser=$matchuser+1;
        }
        else{
            $matchuser=$matchuser+3;
        }

        if($match->max_join>$matchuser){
           $user = User::find($user_id);
           $wallet = $user->wallet;
            if(($wallet+$user->earn_wallet)>=$totalfee){

                if($wallet-$totalfee>=0){
                    $user->wallet=$user->wallet-$totalfee;
                    $user->matchesplayed=$user->matchesplayed+1;
                    $user->save();
                }else{
                    $user->wallet=0;
                    $current = $totalfee-$wallet;
                    $user->matchesplayed=$user->matchesplayed+1;
                    $user->earn_wallet=$user->$earn_wallet-$current;
                    $user->save();
                }
            
                if($type=='solo'){
                    $matchuser = new Matchuser();
                    $matchuser->user_id=$user_id;
                    $matchuser->match_id=$match_id;
                    $matchuser->gamename=$request->input('player1');
                    $matchuser->save();
                    // $user1 = User::find($user_id);
                    // $user1->leaderboard=$user1->leaderboard+15;
                    // $user1->save()
                }else if($type=='duo'){
                    
                    $matchuser = new Matchuser();
                    $matchuser->user_id=$user_id;
                    $matchuser->match_id=$match_id;
                    $matchuser->gamename=$request->input('player1');
                    $matchuser->save();

                    $matchuser1 = new Matchuser();
                    $matchuser1->user_id=$user_id;
                    $matchuser1->match_id=$match_id;
                    $matchuser1->gamename=$request->input('player2');
                    $matchuser1.save();
                    // $user1 = User::find($user_id);
                    // user1.leaderboard=user1.leaderboard+30;
                    // $user1.save()

                }else{
                    $matchuser = new Matchuser();
                    $matchuser->user_id=$user_id;
                    $matchuser->match_id=$match_id;
                    $matchuser->gamename=$request->input('player1');
                    $matchuser->save();

                    $matchuser1 = new Matchuser();
                    $matchuser1->user_id=$user_id;
                    $matchuser1->match_id=$match_id;
                    $matchuser1->gamename=$request->input('player2');
                    $matchuser1->save();

                    $matchuser2 = new Matchuser();
                    $matchuser2->user_id=$user_id;
                    $matchuser2->match_id=$match_id;
                    $matchuser2->gamename=$request->input('player3');
                    $matchuser2->save();

                    $matchuser3 = new Matchuser();
                    $matchuser3->user_id=$user_id;
                    $matchuser3->match_id=$match_id;
                    $matchuser3->gamename=$request->input('player4');
                    $matchuser3->save();
                }
                return 'success';
            }
            else{
                return 'success';
            }
        }else{
             return 'success';
        }

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
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
