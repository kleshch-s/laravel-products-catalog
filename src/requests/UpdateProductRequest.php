<?php

namespace Kleshchs\ProdCatalog\Requests;

use App\Http\Requests\Request;
use Kleshchs\ProdCatalog\Models\Product;

class UpdateProductRequest extends Request{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $product = Product::find($this->input('id'));
        $updatedProduct = $this->input('all');

        // if user role is manager and atr has changed - return 403
        if(app('current_user_type') === 'manager' && $product->art !== $updatedProduct['art']){
            return false;
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
        return [
            'art' => ['required', 'regex: /^[a-zA-Z0-9]+$/'],
            'name' => 'required|min:10'
        ];
    }

}