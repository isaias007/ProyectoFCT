<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Este es el FormRquest de la creacion de los alumnos 
class AlumnoFormRequest extends FormRequest
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
            'nombre' => 'required|max:40',
            'apellidos' => 'required|max:50',
            'curso' => 'required|regex:/^\d{4}\-\d{4}$/i',
            'ciclo' => 'required',
            'email' => 'required|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:/^\d{9}$/i'
        ];
    }

    //Una funcion para poner un mensaje personalizado en caso de que falle la expresion regular del curso 
    public function messages()
{
    return [
        'curso.regex' => 'El formato del curso debe ser AÑO-AÑO',
    ];
}

}
