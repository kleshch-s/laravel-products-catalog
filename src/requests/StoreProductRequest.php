<?php

namespace Kleshchs\ProdCatalog\Requests;

use App\Http\Requests\Request;

class StoreProductRequest extends Request
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
            'art' => ['required', 'regex: /^[a-zA-Z0-9]+$/', 'unique:products'],
            'name' => 'required|min:10'
        ];
    }
}
