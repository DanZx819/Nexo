<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'titulo' => ['required','string', 'min:3', 'max:100'],
            'descricao' => ['required', 'string'],
            'preco' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'quantidade' => ['required', 'numeric']
        ];
    }

    public function storePhoto(){
        if ($this->hasFile('foto')) {
            return $this->file('foto')->store('produtos', 'public');
        }

        return null;
    }
}
