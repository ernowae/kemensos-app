<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LansiaRequest extends FormRequest
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
        return [
            //
            // validasi user
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            // validasi lansia
            'nama'          => 'required',
            'nik'           => 'required',
            'hp'            => 'required',
            'alamat'        => 'required',
            'kecamatan'     => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan'     => 'required',
            'penghasilan'   => 'required',
            'penghasilan'   => 'required',
            'pendidikan'    => 'required',
            'agama'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required'    => ':attribute tidak boleh kosong'
        ];
    }
}
