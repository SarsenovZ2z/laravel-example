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

}
