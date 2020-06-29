<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'       => 'required|max:70',
            'author'      => 'required|max:70',
            'pages'       => 'required|numeric|between:1,1000',
            'genre'       => 'required|max:100|exists:genres,name',
            'cover'       => 'required|image',
            'publisher'   => 'required|max:100',
            'description' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'É obrigatório o preenchimento do campo <b>título</b>.',
            'title.max'            => 'O campo <b>título</b> deve ser menor que 70 caracteres.',
            'author.required'      => 'É obrigatório o preenchimento do campo <b>autor</b>.',
            'author.max'           => 'O campo <b>autor</b> deve ser menor que 70 caracteres.',
            'pages.required'       => 'É obrigatório o preenchimento do campo <b>páginas</b>.',
            'pages.numeric'        => 'O campo <b>páginas</b> deve ser numérico.',
            'pages.between'        => 'O campo <b>páginas</b> deve ser menor que 1000.',
            'genre.required'       => 'É obrigatório o preenchimento do campo <b>gênero</b>.',
            'genre.max'            => 'O campo <b>gênero</b> deve ser menor que 100 caracteres.',
            'genre.exists'         => '"O campo <b>gênero</b> deve ser preenchido com um valor válido.',
            'cover.required'       => 'É obrigatório o preenchimento do campo <b>capa</b>.',
            'cover.image'          => 'O arquivo do campo <b>capa</b> não possui uma extensão válida.',
            'publisher.required'   => 'É obrigatório o preenchimento do campo <b>editora</b>.',
            'publisher.max'        => 'O campo <b>editora</b> deve ser menor que 100 caracteres.',
            'description.required' => 'É obrigatório o preenchimento do campo <b>descrição</b>.',
            'description.max'      => 'O campo <b>descrição</b> deve ser menor que 1000 caracteres.'
        ];
    }
}
