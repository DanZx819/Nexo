<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string','min:3', 'max:50'],
            'email' => ['required', 'string', 'unique:users,email', 'max:50'],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ];
    }

    public function registerUser():bool{
        if ($user = User::query()->create($this->validated())) {
            return true;
        }
        return false;
    }
}
