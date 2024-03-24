<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
        
        $rules = [
            'name' => 'required|min:5',
            'price' => 'required|numeric',
            'description' => 'required|min:20',
            'quantity' => 'required|numeric',
            //'category_id' => 'required',
        ];
        
        if ($this->route()->getActionMethod() !== 'update') {
            $rules['image'] = 'image|required'; 
        }
        
        return $rules;
        
    }
}
