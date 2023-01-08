<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Interface\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function CreateProduct(ProductCreateRequest $productrequest)
    {
        return $this->productRepository->Create($productrequest->all());
    }

    public function UpdateProduct($id, ProductUpdateRequest $productUpdateRequest)
    {
        return $this->productRepository->Update($id, $productUpdateRequest->all());
    }

    public function DeleteProduct($id)
    {
        return $this->productRepository->Delete($id);
    }
}
