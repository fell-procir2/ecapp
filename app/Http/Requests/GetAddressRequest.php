<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAddressRequest extends FormRequest
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
			'zip' => 'required|numeric|digits_between:7,7',
			'state' => 'required|string|max:4',
			'city' => 'required|string|max:50',
			'street' => 'required|string|max:50',
			'tel' => 'required|numeric|digits_between:8,11'
        ];
    }
}
