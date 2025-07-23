<?php

namespace App\Http\Requests;

use App\Models\Produto;
use Illuminate\Foundation\Http\FormRequest;

/** 
 * Handle Login Request
 * @property-read string $id
 * @property-read string $titulo
 * @property-read string $descricao
 * @property-read string $preco
 * @property-read string $foto
 * @property-read string $quantidade
 */

class ProductUpdateRequest extends FormRequest
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
            'id' => ['required'],
            'titulo' => ['string', 'min:3', 'max:100'],
            'descricao' => ['string'],
            'preco' => ['numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'foto' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'quantidade' => ['required', 'numeric']
        ];
    }

    public function UpdateProduct()
    {
        if ($this->hasFile('foto')) {
            $foto_path = $this->file('foto')->store('produtos', 'public');
            Produto::where('id', '=', $this->id)->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'preco' => $this->preco,
                'foto' => $foto_path,
                'quantidade' => $this->quantidade
            ]);
        } else {
            $foto_path = $this->foto;
            Produto::where('id', '=', $this->id)->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'preco' => $this->preco,
                'quantidade' => $this->quantidade
            ]);
        }
    }
}
