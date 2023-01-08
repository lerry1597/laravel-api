<?php

namespace App\Interface;

interface TypeRepositoryInterface
{
    public function Create(array $array);
    public function Update($id, array $array);
    public function Delete($id);
}
