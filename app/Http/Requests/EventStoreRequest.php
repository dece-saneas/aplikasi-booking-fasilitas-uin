<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'name' => 'sometimes|required',
            'faculty' => 'sometimes|required',
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
            'facility_unit_id' => 'required',
            'period' => 'required',
            'ktm' => 'required|max:2048',
            'lampiran' => 'required|max:2048',
            'rundown' => 'required|max:2048',
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
            'name.required' => 'Nama Penyelenggara wajib diisi!',
            'faculty.required' => 'Fakultas wajib diisi!',
            'title.required' => 'Nama atau Judul Acara wajib diisi!',
            'type.required' => 'Tipe Acara wajib diisi!',
            'description.required' => 'Deskripsi Acara wajib diisi!',
            'facility_unit_id.required' => 'Harap pilih unit yang akan dipakai!',
            'period.required' => 'Tentukan kapan acara akan berlangsung!',
            'ktm.required' => 'KTM wajib di upload!',
            'ktm.max' => 'File tidak boleh lebih dari 2 Mb!',
            'lampiran.required' => 'Lampiran Acara wajib di upload!',
            'lampiran.max' => 'File tidak boleh lebih dari 2 Mb!',
            'rundown.required' => 'Rundown Acara wajib di upload!',
            'rundown.max' => 'File tidak boleh lebih dari 2 Mb!',
        ];
    }
}
