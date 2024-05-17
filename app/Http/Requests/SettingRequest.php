<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
			'show_landing_page' => 'required',
			'can_register' => 'required',
			'monitor_stock' => 'required',
			'company_logo_file' => 'nullable|mimes:png,jpg|max:2048',
			'company_name' => 'string',
			'company_email' => 'string',
			'company_phone' => 'string',
			'company_address' => 'string',
        ];
    }
}
