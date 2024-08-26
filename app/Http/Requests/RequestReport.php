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
            'report' => 'required|string|max:255',
            'proof' => 'required|array',
            'proof.*' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
