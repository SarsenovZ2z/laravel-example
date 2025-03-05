<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateVatTaxRequest;
use App\Modules\Country\Repositories\CountryRepository;
use App\Modules\Product\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getVatTaxCalculatorForm(
        Request           $request,
        ProductRepository $productRepository,
    ): View
    {
        $products = $productRepository->getAllProducts();

        return view('pages.vat-tax-calculator-form', [
            'products' => $products,
        ]);
    }

    public function calculateVatTax(
        CalculateVatTaxRequest $request,
        ProductRepository      $productRepository,
        CountryRepository      $countryRepository,
    ): View
    {
        $user_tax_number = $request->getTaxNumber();

        $product = $productRepository->getProductById($request->getProductId()) ?? abort(404, 'Product not found');
        $country = $countryRepository->getCountryByTaxNumber($user_tax_number) ?? abort(404, 'Country not found');

        $cost_with_vat_tax = $productRepository->calculatePriceIncludingVatTax($product, $country->vat_tax);

        return view('pages.vat-tax-calculator-result', [
            'user_tax_number' => $user_tax_number,
            'product' => $product,
            'country' => $country,
            'cost_with_vat_tax' => $cost_with_vat_tax,
        ]);
    }

}
