<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
            'name'=> ['required','min:3', 'max:255', 'unique:courses'],
            'image'=>['nullable','image','max:1024' ],
            'description'=>['nullable','min:5', 'max:9999'],
            'available'=>['nullable','boolean']
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'image.max' => 'Tamanho maximo  da imagem permitida é de 1MB',
            'image.image' => 'Extensão não permitida | Somente PNG e JPEG',
            'description.min' => 'As Informções do curso deve ter no minimo 5 caracteres',
            'description.max' => 'As Informções do curso deve ter no minimo 9999 caracteres'

        ];
    }
}
