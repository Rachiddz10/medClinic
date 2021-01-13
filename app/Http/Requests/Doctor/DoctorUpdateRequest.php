<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
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
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required|unique:doctors,username,'.$this->route()->doctor.',id',
            'email'=>'required|email|unique:doctors,email,'.$this->route()->doctor.',id'
        ];
    }

    public $first_name_last_name_exist_msg =  "Un Docteur avec le meme Nom et Prénom Entrée existe deja!";

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Le Prénom est obligatoire.',
            'last_name.required' => 'Le Nom est obligatoire.',
            'username.required' => 'Le Username est obligatoire.',
            'email.required' => 'L\'Adresse E-mail est obligatoire.',

            'username.unique' => 'Ce Username est déjà utilisée!',
            'email.unique' => 'Cette Adresse E-mail est déjà utilisée!',

            'email.email' => 'L`\'Adresse E-mail n\'est pas valide.'
        ];
    }
}