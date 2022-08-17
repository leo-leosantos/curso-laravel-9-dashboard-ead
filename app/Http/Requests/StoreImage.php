<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImage extends FormRequest
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
                'image' => ['required', 'image','max:1024']
        ];
    }


    public function messages()
    {
        return [
            'image.required' => 'A Imagem é obrigatória',
            'image.max' => 'Tamanho maximo permitido é de 1MB',
            'image.image' => 'Extensão não permitida | Somente PNG e JPEG',


        ];
    }
}
