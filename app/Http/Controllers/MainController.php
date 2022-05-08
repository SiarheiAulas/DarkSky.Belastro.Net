<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class MainController extends Controller
{
    public function index(){
        $points=Location::all();
        return view('map', compact('points'));
    }
    
    public function filter(Request $request){
        $direction=$request->input('direction');
        $lp=$request->input('lp');
        $horizon=$request->input('horizon');
        $hills=$request->input('hills');
        $transp=$request->input('transp');
        $points=Location::where('direction', $direction)->orWhere('lp', $lp)->orWhere('horizon', $horizon)->orWhere('hills', $hills)->orWhere('transp', $transp)->get();
        return view('map', compact('points'));
    }
}
