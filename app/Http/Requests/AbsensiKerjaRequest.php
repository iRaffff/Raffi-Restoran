<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiKerjaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_karyawan' => 'required',
            'tanggal_masuk' => 'required',
            'waktu_masuk' => 'required',
            'status' => 'required',
            'waktu_selesai_kerja' => 'required',
        ];
    }
    public function massages()
    {
        return [
            'nama_karyawan.required' => 'Nama maryawan harus diisi.',
            'tanggal_masuk.required' => 'Tanggal masuk harus diisi.',
            'waktu_masuk.required' => 'Waktu masuk harus diisi.',
            'status.required' => 'Status harus diisi.',
            'waktu_selesai_kerja.required' => ' Waktu selesai kerja harus diisi.',
        ];
    }
}
