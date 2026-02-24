<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\LocationRequest;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function store(Request $request){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
	    $date = now()->format('d-m-Y');
            $path = $file->storeAs("locations/$date", $fileName, 'public');
            $url = asset('storage/' . $path);
            return response()->json(['location' => $url]);
    }

/*public function uploadmap(Request $request){
            if($request->is('locations')||$request->is('locations/*')){
		if($request->file('mapimg')){
			$path=Storage::putFile('locations', $request->file('mapimg'));
		        return $path;
		}
            }   
    }
	
    public function uploadpano(Request $request){
            if($request->is('locations')||$request->is('locations/*')){
		if($request->file('pano')){
        	  	$path=Storage::putFile('locations', $request->file('pano'));
		        return $path;
		}
	    }     
    }*/
}
