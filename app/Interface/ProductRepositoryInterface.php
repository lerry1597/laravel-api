<?php

namespace App\Interface;

interface ProductRepositoryInterface
{
    public function Create(array $array);
    public function Update($id, array $array);
    public function Delete($id);
}
