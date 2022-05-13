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
    
   //s public function filter(Request $request){
   //     $gray=$request->input('gray');
	//	$gray=$request->input('gray');
    //    $blue=$request->input('blue');
    //    $lightblue=$request->input('lightblue');
    //    $green=$request->input('green');
    //    $yellow=$request->input('yellow');
    //    $orange=$request->input('orange');
    //    $red=$request->input('red');
    //    $south=$request->input('south');
    //    $north=$request->input('north');
    //    $west=$request->input('west');
    //    $east=$request->input('east');
    //    $hills=$request->input('hills');
    //    $valley=$request->input('valley');
    //    $plato=$request->input('plato');
    //    $auto1=$request->input('auto1');
    //    $auto2=$request->input('auto2');
    //    $train=$request->input('train');
    //    $bus=$request->input('bus');
    //    $distance=$request->input('distance');
    //    
    //    $points=Location::where('gray', $gray)->whereNotNull('gray')
	//		->orWhere('blue', $blue)->whereNotNull('gray')
	//		->orWhere('lightblue', $lightblue)->whereNotNull('lightblue')
	//		->orWhere('green', $green)->whereNotNull('green')
	//		->orWhere('yellow', $yellow)->whereNotNull('yellow')
	//		->orWhere('orange', $orange)->whereNotNull('orange')
	//		->orWhere('red', $red)->whereNotNull('red')->orWhere
	//		
	//		
	//		->orWhere('south', $south)->whereNotNull('south')
	//		->orWhere('north', $north)->whereNotNull('north')
	//		->orWhere('west', $west)->whereNotNull('west')
	//		->orWhere('east', $east)->whereNotNull('east')
	//		->orWhere('hills', $hills)->whereNotNull('hills')
	//		->orWhere('valley', $valley)->whereNotNull('valley')
	//		->orWhere('plato', $plato)->whereNotNull('plato')
	//		->orWhere('auto1', $auto1)->whereNotNull('auto1')
	//		->orWhere('auto2', $auto2)->whereNotNull('auto1')
	//		->orWhere('train', $train)->whereNotNull('train')
	//		->orWhere('bus', $bus)->whereNotNull('bus')
	//		->orWhere('distance','>=', $distance)->whereNotNull('distance')
	//	->get();
	//	
    //    return view('map', compact('points'));
    //}
}
