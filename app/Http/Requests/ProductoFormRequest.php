<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_categoria' => 'required',
            'codigo_prod' => 'required|max:50',
            'nombre_prod' => 'required|max:100',
            'stock' => 'required|numeric',
            'descripcion' => 'max:500',
            'imagen_prod' => 'mimes:jpeg,bpm,png',
        ];
    }
}
