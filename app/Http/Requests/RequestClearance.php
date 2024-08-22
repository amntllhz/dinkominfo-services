<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestClearance extends FormRequest
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
            'instansi' => 'required|string|max:255',
            'title_req' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'add_inform' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'documents' => 'required|array',
            'documents.*' => 'file|mimes:pdf,doc,docx|max:10240',
            // 'documents' => 'required|file|mimes:pdf,docx|max:10240', // Max 10MB
        ];
    }
}
