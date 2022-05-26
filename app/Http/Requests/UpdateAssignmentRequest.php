<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_user' => 'required|exists:users,id',
            'title' => 'required|string|max:100',
            'note' => 'string|nullable',
            'warning_date' => 'date|nullable'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'El titulo es requerido',
            'id_user.exists' => 'El usuario no tiene ninguna tarea asociada'
        ];
    }
}
