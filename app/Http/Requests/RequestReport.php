<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestReport extends FormRequest
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
            'applicant' => 'required|string|max:255',
            'instansi' => 'required|int',
            'service' => 'required|int',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'report' => 'required|string|max:500',
            'proof' => 'required|array',
            'proof.*' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'report' => 'Laporan terlalu panjang.',
            'phone' => 'Nomor Telepon harus berupa angka.',
            'proof.*.mimes' => 'Bukti Screenshot harus bertipe: jpeg, png, jpg, gif.',
            'proof.*.max' => 'Bukti Screenshot tidak boleh lebih dari 2MB.',
        ];
    }
}
