<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Client;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
        return   $rules=[
            'description' => ['required'],
            'name'=>[
                'required',
                'max:255',
                Rule::unique('clients')
                    ->ignore( $this->id,'id')
            ],
        ];
    }
}
