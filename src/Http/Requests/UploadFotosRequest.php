<?php

namespace Stalker\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UploadFotosRequest extends FormRequest
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
    private $errors = [];
    private $rules = [
      'file-capa' => 'mimes:jpg,jpeg,bmp,png', //|max:1024',//tamanho máximo: 1024kb
      'file.*'    => 'mimes:jpg,jpeg,bmp,png', //|max:1024',//tamanho máximo: 1024kb
    ];

    public function validar(Request $request)
    {
        $retorno = true;

        $messages = [
        'file-capa.mimes' => 'A imagem da capa deve ter um dos seguintes formatos: jpg, jpeg, bmp ou png.',
        'file.*mimes'     => ':attribute deve ter um dos seguintes formatos: jpg, jpeg, bmp ou png.',
        'file-capa.max'   => 'A imagem da capa pode ter, no máximo, 1024kb.',
        'file.*max'       => ':attribute pode ter, no máximo, 1024kb.'
        ];

        $input = $request->all();

        $validator = \Validator::make($input, $this->rules, $messages);

        //Now check validation:
        if ($validator->fails()) {
            $this->errors = $validator->errors()->messages();
            $retorno = false;
        }

        if (!$this->validar_detalhes($request)) {
            $retorno = false;
        }

        return $retorno;
    }

    private function validar_detalhes(Request $request)
    {
        $input = $request->all();
        $resultado = true;

        if (empty($input)) {
            $this->errors[] = array('Formulário inválido.');
            return false;
        }
        return $resultado;
    }


    public function messages()
    {
        return $this->errors;
    }
}
