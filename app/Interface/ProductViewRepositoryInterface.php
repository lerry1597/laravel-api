<?php

namespace App\Interface;

interface ProductViewRepositoryInterface
{
    public function ViewAll();
    public function ViewDetails($id);
}
