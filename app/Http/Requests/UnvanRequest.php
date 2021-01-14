<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnvanRequest extends FormRequest
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
            'unvan_adi' => 'required|unique:kullanici_unvanlar,unvan_adi,'.$this->unvan_adi,
        ];
    }

    public function messages()
    {
        return [
            'unvan_adi.required' => 'Lütfen ünvan adını yazın.',
            'unvan_adi.unique' => 'Aynı isimde ünvan zaten var.',
        ];
    }
}