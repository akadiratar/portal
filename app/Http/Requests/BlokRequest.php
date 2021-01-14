<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlokRequest extends FormRequest
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
            'blok_adi' => 'required|unique:yapi_bloklar,blok_adi,'.$this->blok,
        ];
    }

    public function messages()
    {
        return [
            'blok_adi.required' => 'Lütfen blok adını yazın.',
            'blok_adi.unique' => 'Blok adı daha önce eklenmiş.',
        ];
    }
}
