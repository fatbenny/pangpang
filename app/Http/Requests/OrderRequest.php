<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class OrderRequest extends FormRequest
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
            'id' => 'required|string|regex:/^A[0-9]{7}$/',
            'name' => 'required|string',
            'address' => 'required|array',
            'address.city' => 'required|string',
            'address.district' => 'required|string',
            'address.street' => 'required|string',
            'price' => 'required|numeric|min:1',
            'currency' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'ID is required',
            'id.string' => 'ID must be a string',
            'id.regex' => 'ID must follow the pattern A followed by 7 digits',

            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',

            'address.required' => 'Address is required',
            'address.array' => 'Address must be an array',
            'address.city.required' => 'City is required',
            'address.city.string' => 'City must be a string',
            'address.district.required' => 'District is required',
            'address.district.string' => 'District must be a string',
            'address.street.required' => 'Street is required',
            'address.street.string' => 'Street must be a string',

            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be greater than 0',

            'currency.required' => 'Currency is required',
            'currency.string' => 'Currency must be a string',
        ];
    }
}
