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
    
   	public function filter(Request $request)
    {
		//$points=Location::whereIn('gray',$request->input('lp'))
		//	->orWhereIn('green',$request->input('lp'))
		//	->orWhereIn('blue',$request->input('lp'))
		//	->orWhereIn('lightblue',$request->input('lp'))
		//	->orWhereIn('yellow',$request->input('lp'))
		//	->orWhereIn('orange',$request->input('lp'))
		//	->orWhereIn('red',$request->input('lp'))
		//	->get();
		
		$points=Location::where(function($query) use($request){
							$query->orWhereIn('green',$request->input('lp'))
								  ->orWhereIn('blue',$request->input('lp'))
								  ->orWhereIn('lightblue',$request->input('lp'))
								  ->orWhereIn('yellow',$request->input('lp'))
								  ->orWhereIn('orange',$request->input('lp'))
								  ->orWhereIn('red',$request->input('lp'));
							})
							->where(function($query) use($request){
							$query->orWhereIn('hills',$request->input('relief'))
								  ->orWhereIn('valley',$request->input('relief'))
							      ->orWhereIn('plato',$request->input('relief'));
							})
							->where(function($query) use($request){
							$query->orWhereIn('auto1',$request->input('transport'))
								  ->orWhereIn('auto2',$request->input('transport'))
							      ->orWhereIn('train',$request->input('transport'))
							      ->orWhereIn('bus',$request->input('transport'));
							})
							->where(function($query) use($request){
							$query->orWhereIn('south',$request->input('horizon'))
								  ->orWhereIn('north',$request->input('horizon'))
							      ->orWhereIn('west',$request->input('horizon'))
							      ->orWhereIn('east',$request->input('horizon'));
							})
							->where('distance','>=', $request->input('distance'))
							->get();

		return view('map', compact('points'));
    }
}
