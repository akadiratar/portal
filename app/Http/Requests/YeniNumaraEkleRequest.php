<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YeniNumaraEkleRequest extends FormRequest
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
            'tip' => 'required',
            'numara' => 'required|unique:tys_numaralar,no,'.$this->numara,
        ];
    }

    public function messages()
    {
        return [
            'tip.required' => 'Lütfen numara tipini seçin.',
            'numara.unique' => 'Girdiğiniz numara daha önce kaydedilmiş.',
            'numara.required' => 'Lütfen numarayı yazın.',
        ];
    }
}
