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
   // public function authorize()
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
			'direction'=>'required|alpha|min:1|max:1',
			'distance'=>'nullable|numeric|min:0|max:500|digits_between:1,3',
			'transp'=>'required|alpha|min:3|max:5',
			'lp'=>'required|alpha|min:3|max:9',
			'sqm'=>'nullable|numeric|min:15|max:24',
			'horizon'=>'required|alpha|min:1|max:1',
			'hills'=>'required|alpha|min:1|max:1',
			'host'=>'required|alpha|min:2|max:10',
			'url'=>'required|url',
			'description'=>'required|min:10|max:1000'
        ];
    }
}
