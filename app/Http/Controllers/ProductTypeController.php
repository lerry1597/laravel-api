<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\ProductTypereRequest;
use App\Http\Requests\UpdateTyperRequest;
use App\Interface\ProductTypeRepositoryInterface;
use App\Interface\TypeRepositoryInterface;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    private TypeRepositoryInterface $typeRepository;

    public function __construct(TypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function CreateProductType(CreateTypeRequest $productTypereRequest)
    {
        return $this->typeRepository->Create($productTypereRequest->all());
    }

    public function UpdateProductType($id, UpdateTyperRequest $updateTyperRequest)
    {
        return $this->typeRepository->Update($id, $updateTyperRequest->all());
    }

    public function DeleteProductType($id)
    {
        return $this->typeRepository->Delete($id);
    }
}
