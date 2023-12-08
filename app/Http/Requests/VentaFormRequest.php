<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'proveedor_id' => 'required',
            'tipo_comprobante' => 'required|max:20',
            'num_comprobante' => 'max:7',
            'id_producto' => 'required|max:10',
            'cantidad' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
        ];
    }
}
