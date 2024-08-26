<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDomain extends FormRequest
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
            'app_name' => 'required|string|max:255',
            'desc_name' => 'required|string|max:255',
            'site' => 'required|string|max:255',
            'ip' => 'nullable|string|max:255',
            'add_inform' => 'nullable|string|max:255',
            'document' => 'required|file|mimes:pdf,docx|max:10240', // Max 10MB
        ];
    }
}
