<?php

namespace Artista\Http\Requests\Commerce;

use Population\Models\Commerce\Product;

class ProductRequest extends CommerceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Product::$rules;
    }
}
