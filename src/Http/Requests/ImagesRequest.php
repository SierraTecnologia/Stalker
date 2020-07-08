<?php

namespace Stalker\Http\Requests;

use Auth;
use Gate;
use Stalker\Models\Imagen as Image;
use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Illuminate\Support\Facades\Config::get('app.env') !== 'testing') {
            return Gate::allows('cms', Auth::user());
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Image::$rules;
    }
}
