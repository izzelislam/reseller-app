<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
			'category_id' => 'required',
			'name' => 'required|string',
			'describtion' => 'required|string',
			'image_file' => 'nullable|mimes:png,jpg|max:2048',
			'price' => 'required|numeric',
			'reseller_comission' => 'required|numeric',
			'stock' => 'nullable|numeric',
			'status' => 'required|string',
            'reseller_price' => 'nullable|numeric'
        ];
    }
}