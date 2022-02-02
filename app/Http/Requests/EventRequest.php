<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'start_event' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo Título Evento é obrigatorio',
            'description.required' => 'O campo Descrição Rápida Evento  é obrigatorio',
            'body.required' => 'O campo Fale mais Sobre o Evento é obrigatorio',
            'start_event.required' => 'O campo Quando Vai Acontecer? é obrigatorio'
        ];
    }
}
