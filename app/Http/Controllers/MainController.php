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

	static $groups = ['lp', 'horizon', 'relief', 'transport'];


    public function filter(Request $request)
    {
		$query = Location::where('distance','<=', $request->input('distance'));
		
		foreach (self::$groups as $group) {
			if ($request->input($group)) {
				$query->where(function($query) use ($request, $group) {
					foreach ($request->input($group) as $k=>$v) {
						if ($v) {
							$query->orWhereNotNull($k);
						}
					}
				});
			}
		}

		$points=$query->get();

		return view('map', compact('points'));
    }
}
