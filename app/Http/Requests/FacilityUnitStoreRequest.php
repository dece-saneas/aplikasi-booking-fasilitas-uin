<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityUnitStoreRequest extends FormRequest
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
            'facility_id' => 'required',
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:50',
            'description' => 'required'
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
            'facility_id.required' => 'Harap pilih Fasilitas!',
            'photo.required' => 'Photo wajib di upload!',
            'photo.image' => 'File yang di diterima hanya Image!',
            'photo.mimes' => 'File yang di diterima hanya JPEG, PNG, dan JPG!',
            'photo.max' => 'File tidak boleh lebih dari 2 Mb!',
            'name.required' => 'Kolom Nama wajib di isi!',
            'description.required' => 'Kolom Keterangan wajib di isi!',
        ];
    }
}
