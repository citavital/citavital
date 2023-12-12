<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePacienteRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'nacimiento' => ['nullable', 'date'],
            'genero' => ['nullable', Rule::in(['hombre', 'mujer', 'otro'])],
            'direccion' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            'altura' => ['nullable', 'numeric'],
            'tipo_altura' => ['nullable', Rule::in(['metros', 'pies'])],
            'peso' => ['nullable', 'numeric'],
            'tipo_peso' => ['nullable', Rule::in(['libras', 'kilos'])],
            'imc' => ['nullable', 'numeric'],
            'presion_arterial' => ['nullable', 'string'],
            'alergias' => ['nullable', 'string'],
        ];
    }
}
