<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdviceStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'facility_unit_id' => 'required',
            'advice' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Kolom Nama wajib di isi!',
            'email.required' => 'Kolom Email wajib di isi!',
            'facility_unit_id.required' => 'Harap pilih Unit!',
            'advice.required' => 'Isi Saran wajib di isi!',
        ];
    }
}
