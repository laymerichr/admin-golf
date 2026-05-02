<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests\Admin
 */
class CreateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return   $rules = [
           // 'name' => ['required', 'string', 'max:255','regex:/^[\pL\s\-]+$/u'],
            'email' => [
                'required', 'email', 'max:255',
                'regex:/\S+@\S+\.\S+/',
                 Rule::unique('users'),
            ],
            'role_id' => ['required'],
           // 'cod_club' => ['required'],
            'password' => ['required','min:6'],
            'confirm_password' => 'required|same:password|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'El campo es obligatorio',
            'password.min' => 'El campo debe tener al menos 6 caracteres',
            'confirm_password.required' => 'El campo es obligatorio',
            'confirm_password.same' => 'Las contraseñas no coinciden',
            'confirm_password.min' => 'El campo debe tener al menos 6 caracteres',
            'role_id.required' => 'El campo es obligatorio',
        ];
    }
}
