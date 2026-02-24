<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Services\DistanceCalculator;

class MainController extends Controller
{
    public function index(){
        $points=Location::all();
        return view('map', compact('points'));
    }

	static $groups = ['lp', 'horizon', 'relief', 'transport'];


    public function filter(Request $request, DistanceCalculator $distance_calculator)
    {
	$user_lat = $request->user_lat;
	$user_long = $request->user_long;
	$distance = $request->distance;

	$query = Location::query();
		
if ($request->has('lp')) {
    $query->where(function ($q) use ($request) {
        foreach ($request->input('lp') as $k => $v) {
            $q->orWhereNotNull($k);
        }
    });
}

foreach (['horizon', 'relief', 'transport'] as $group) {
    if ($request->has($group)) {
        $query->where(function ($q) use ($request, $group) {
            foreach ($request->input($group) as $k => $v) {
                $q->orWhereNotNull($k);
            }
        });
    }
}


		$all_points=$query->get();

		$points = $all_points->filter(function ($point) use ($user_lat, $user_long, $distance, $distance_calculator) {
            	$calculated_distance = $distance_calculator->calculate_distance($user_lat, $point->lat, $user_long, $point->long);
            
            return $calculated_distance <= $distance;
        });

		return view('map', compact('points'));
    }
}
