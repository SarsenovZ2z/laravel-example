<?php

namespace App\Http\Requests;

use App\Rules\CheckTaxNumberValidity;
use Illuminate\Foundation\Http\FormRequest;

class CalculateVatTaxRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tax_number' => [
                'required',
                'string',
                new CheckTaxNumberValidity(),
            ],
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function getTaxNumber(): string
    {
        return $this->input('tax_number');
    }

    public function getProductId(): int|string
    {
        return $this->input('product_id');
    }
}
