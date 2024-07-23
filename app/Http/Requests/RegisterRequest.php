<?php

namespace App\Http\Requests;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            /* 'terms' => ['accepted'], */
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tu nombre es requerido',
            'email.required' => 'Tu correo es requerido',
            'email.unique' => 'El correo ya existe en nuestra base de datos',
            'password.required' => 'Tu contraseña es requerida',
            'password.min' => 'Tu contraseña debe ser de al menos 8 carácteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            /* 'terms.accepted' => 'Debes aceptar los terminos y condiciones', */
        ];
    }
}
