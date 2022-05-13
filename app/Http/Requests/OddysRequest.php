<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OddysRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //public function authorize()
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
            'header'=>'required||min:10||max:200',
			'url'=>'required||url',
			'description'=>'nullable||min:10||max:10000'
		];
    }
}