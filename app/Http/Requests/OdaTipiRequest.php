<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OdaTipiRequest extends FormRequest
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
            'oda_tipi_adi' => 'required|unique:yapi_oda_tipleri,oda_tipi_adi,'.$this->oda_tipi,
        ];
    }

    public function messages()
    {
        return [
            'oda_tipi_adi.required' => 'Lütfen oda tipi adını yazın.',
            'oda_tipi_adi.unique' => 'Oda tipi adı daha önce eklenmiş.',
        ];
    }
}
