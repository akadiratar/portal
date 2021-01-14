<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BirimRequest extends FormRequest
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
            'ust_birim_id' => 'required',
            'birim_adi' => ['required', Rule::unique('yapi_birimler')->where(function ($query) {
                               return $query->where('ust_birim_id', $this->ust_birim_id);
                            }),],
            
        ];
    }

    public function messages()
    {
        return [
            'ust_birim_id.required' => 'Lütfen üst birimi seçin.',
            'birim_adi.unique' => 'Aynı üst birime bağlı aynı isimde birim zaten var.',
            'birim_adi.required' => 'Lütfen birim adını yazın.',
        ];
    }
}