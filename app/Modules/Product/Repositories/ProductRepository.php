<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{

    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductById(int $id): ?Product
    {
        return Product::query()->find($id);
    }

    public function calculatePriceIncludingVatTax(Product $product, float $vat_tax): float
    {
        return $product->price * (1 + $vat_tax / 100);
    }

}
