<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest
 * @package App\Http\Requests\Admin
 */
class UpdateUserRequest extends FormRequest
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
                'required',
                'email',
                'regex:/\S+@\S+\.\S+/',
                'max:255',
                /*Rule::unique('users')
                    ->where('deleted_at', null)
                    ->ignore( $this->id,'id'),*/
            ],
            'role_id' => ['required'],
           // 'cod_club' => ['required'],
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'confirm_password.same' => 'Las contraseñas no coinciden',
            'role_id.required' => 'El campo es obligatorio',
        ];
    }
}
