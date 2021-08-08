<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'style' => 'required',
            'category' => 'required',
            'ibu' => 'required',
            'abv' => 'required',
            'glass' => 'required',
            'temperature' => 'required',
            'food_pairing' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'url_photo' => 'required'
        ];
    }
}
