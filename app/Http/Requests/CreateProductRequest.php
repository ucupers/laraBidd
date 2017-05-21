<?php

namespace auctionTime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'imgUrl' => 'required|string|min:3|max:255',
            'minBid' => 'required|numeric',
            'instantPurchasePrice' => 'numeric',
            'duration' => 'numeric|min:1|max:31',
            'active' => 'boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date'
        ];
    }
}
