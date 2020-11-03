<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Active;
use Carbon\Carbon;
use Auth;

class AppController extends Controller
{

    public function index(){
       $authUser = Auth::check();
        if($authUser){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login');
        }
    }

    
    public function new(){
        $t = Active::first()->created_at;
        
        return view('welcome' , compact('t'));
    }

    
    public function verify(Request $request){
        $key = $request->input('reg');
        $count = Active::first();
        $now = Carbon::parse($count->created_at);
        $d = date("d", strtotime($now));
        $m = date("m", strtotime($now));
        $y = date("Y", strtotime($now));
        $h = date("H", strtotime($now));
        $mm = date("i", strtotime($now));
        $s = date("s", strtotime($now));
        $day = (( ($d * $m * $y) * ($d + $y)) + ($h * $mm * $s) ) * $s ;
       
        if($key == $day){
            $count->status = 1;
            $count->save();
            return redirect()->route('login');
        }

        return redirect()->back();

    }

    public function about(){
        return view('about');
    }

    public function agree(){
        return view('agree');
    }
}
