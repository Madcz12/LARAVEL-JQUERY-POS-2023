<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            //
            'nombre' => 'required|max:50',
            'tipo_documento' => 'max:50',
            'num_documento' => 'max:50',
            'direccion' => 'max:250',
            'telefono' => 'max:20',
            'email' => 'max:50',
        ];
    }
}
