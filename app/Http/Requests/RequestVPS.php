<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVPS extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'cpu' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,docx|max:10240', // Max 10MB
        ];
    }
}
