<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   // publi function authorize()
    //{
       // return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:200',
			'lat'=>'required|numeric',
			'long'=>'required|numeric',
			'distance'=>'nullable|numeric|min:0|max:500|digits_between:1,3',
			'sqm'=>'nullable|numeric|min:15|max:24',
			'host'=>'required|alpha|min:2|max:12',
			'description'=>'required|min:10',
			'mapimg'=>'nullable|file|image|max:512',
			'pano'=>'nullable|file|image|max:512',
			'code'=>'nullable||min:2|max:5',
			'url_gmap'=>'nullable|url',
			'url_wiki'=>'nullable|url',
			'url_openstr'=>'nullable||url',
			'link_ody'=>'nullable|url',
			'gray' => 'nullable|alpha|min:5|max:5', 
			'blue' => 'nullable|alpha|min:5||max:5',
			'lightblue' => 'nullable|alpha||min:7|max:7', 
			'green' => 'nullable|alpha|min:7|max:7', 
			'yellow' => 'nullable|alpha|min:6|max:6', 
			'orange' => 'nullable|alpha|min:9|max:9',
			'red' => 'nullable|alpha|min:7|max:7',
			'south' => 'nullable|min:6|max:6',
			'north' => 'nullable|min:9|max:9',
			'west' => 'nullable|min:9|max:9',
			'east' => 'nullable|min:10|max:10',
			'hills' => 'nullable|alpha|min:5|max:5',
			'valley' => 'nullable|alpha|min:6|max:6',
			'plato' => 'nullable|alpha|min:5|max:5',
			'auto1' => 'nullable|min:21|max:21',
			'auto2' => 'nullable|min:24|max:24',
			'train' => 'nullable|alpha|min:5|max:5',
			'bus' => 'nullable|alpha|min:7|max:7',
		];  
	}
}
