<?php

namespace App\Http\Controllers;

use App\Interface\ProductViewRepositoryInterface;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    private ProductViewRepositoryInterface $productViewRepository;

    public function __construct(ProductViewRepositoryInterface $productViewRepository)
    {
        $this->productViewRepository = $productViewRepository;
    }

    public function ViewAllProduct()
    {
        return $this->productViewRepository->ViewAll();
    }

    public function ViewDetailsProduct($id)
    {
        return $this->productViewRepository->ViewDetails($id);
    }
}
