<?php

namespace App\Contracts;

interface ProductInterface
{
    public function list($filter, $type, $pagination);
}
