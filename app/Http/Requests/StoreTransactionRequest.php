<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'numeroTarjeta' => 'required | numeric | digits:16',
            'cvt' => 'required | numeric',
            'cp' => 'required | numeric | digits:5',
            'mesExpiracion' => 'required | numeric | digits:2',
            'anyoExpiracion' => 'required | numeric | digits:2',
            'monto' => 'required | numeric',
            'email' => 'required | email',
            'telefono' => 'required | numeric',
            'celular' => 'required | numeric',
            'calleyNumero' => 'required',
            'colonia' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'idPedido' => 'required',
        ];
    }
}
