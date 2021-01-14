<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KatRequest extends FormRequest
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
            'blok_id' => 'required',
            'kat_adi' => ['required', Rule::unique('yapi_katlar')->where(function ($query) {
                               return $query->where('blok_id', $this->blok_id);
                            }),],
            
        ];
    }

    public function messages()
    {
        return [
            'blok_id.required' => 'Lütfen blok seçin.',
            'kat_adi.unique' => 'Seçtiğiniz blokta aynı isimde kat zaten var.',
            'kat_adi.required' => 'Lütfen kat adını yazın.',
        ];
    }
}
