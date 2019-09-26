<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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

            'nome' => 'required|min:2'

        ];
    }
    public function messages(){
        return [
            // :attribute é substituído pelo nome do campo que caiu na condição do erro
            'required' => 'O campo :attribute é obrigatório',
            //Poderia colocar o attribute tbm, mas para mostrar outra possibilidade de escrever, deixarei dessa forma.
            'nome.min'=> 'o campo nome precisa ter pelo menos 2 caracteres.'
        ];
    }
}
