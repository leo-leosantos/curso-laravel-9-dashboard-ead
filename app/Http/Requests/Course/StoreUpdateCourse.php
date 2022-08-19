<?php

namespace App\Http\Requests\Course;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCourse extends FormRequest
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
        // pegar pelo segmento da url
        //admin segmento 1
        // courses segmento 2
        // id segmento 3
        //http://localhost/eadsp/public/admin/courses/2bfd7b86-dc1f-44fa-8621-1c3d34511860
       // $id = $this->segment(3);

        /**
         * paramentro da rota
         * $this->course
         */
            $id = $this->course;

        $rules = [
            'name'=> [
                'required',
                'min:3',
                'max:255',
                //"unique:courses,name,{$id},id",

                Rule::unique('courses')->ignore($id)
            ],
            'image'=>['nullable','image','max:1024' ],
            'description'=>['nullable','min:5', 'max:9999'],
            'available'=>['nullable','boolean']
        ];

        //validação difrentes para cadastro e edição , fazendo validação pelo method - put ou post
        // if($this->method() == 'PUT')
        // {
        //     $rules['image'] = [
        //         'image'=>['nullable','image','max:2048' ],

        //     ];
        // }
        return  $rules;
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
