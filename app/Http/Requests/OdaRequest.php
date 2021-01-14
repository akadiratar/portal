<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OdaRequest extends FormRequest
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
            'kat_id' => 'required',
            'oda_numarasi' => ['required', Rule::unique('yapi_odalar')->where(function ($query) {
                               return $query->where('kat_id', $this->kat_id);
                            }),],
            
        ];
    }

    public function messages()
    {
        return [
            'kat_id.required' => 'Lütfen kat seçin.',
            'oda_numarasi.unique' => 'Seçtiğiniz katta aynı isimde kat zaten var.',
            'oda_numarasi.required' => 'Lütfen kat adını yazın.',
        ];
    }
}
