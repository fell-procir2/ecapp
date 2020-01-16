<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddressRequest extends FormRequest
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
	protected function failedValidation(Validator $validator)
	{
		$this->merge(['validated' => 'true']);
		throw new HttpResponseException(
			//編集 -> バリデーションチェックNG -> リダイレクト
			redirect(route('address.reEdit'))->withErrors($validator)->withInput()->with('request', $this->request)
		);
	}
}
