<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SesiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //
        return [
            'tahun_anggaran' => 'required',
            'status'        => 'required',
            'mulai'         => 'required',
            'selesai'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required'    => ':attribute tidak boleh kosong'
        ];
    }
}
