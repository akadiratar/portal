<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KullaniciRequest extends FormRequest
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
            'kullanici_adi' => 'required',
            'kullanici_soyadi' => 'required',
            'kullanici_sicili' => 'required|unique:kullanicilar,kullanici_sicili,'.$this->kullanici,
            'unvan_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kullanici_adi.required' => 'Lütfen kullanıcı adını yazın.',
            'kullanici_soyadi.required' => 'Lütfen kullanıcı soyadını yazın.',
            'kullanici_sicili.required' => 'Lütfen kullanıcı sicilini yazın.',
            'kullanici_sicili.unique' => 'Aynı sicilde kişi zaten var.',
            'unvan_id.required' => 'Lütfen kullanıcı ünvanını seçin.',
        ];
    }
}