<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class FileController extends Controller
{
    
    public function uploadmap(Request $request){
       
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
    }
}
