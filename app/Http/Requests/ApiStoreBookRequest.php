<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiStoreBookRequest extends FormRequest
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
            'title'       => 'required|max:70',
            'author'      => 'required|max:70',
            'pages'       => 'required|numeric|between:1,1000',
            'genre'       => 'required|max:100|exists:genres,name',
            'publisher'   => 'required|max:100',
            'description' => 'required|max:1000',
        ];
    }
}
