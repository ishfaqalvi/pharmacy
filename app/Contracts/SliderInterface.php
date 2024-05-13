<?php

namespace App\Contracts;

interface SliderInterface
{
    public function list($pagination, $orderby);

    public function new();

	public function store($data);

	public function find($id);

	public function update($data, $id);

	public function delete($id);

	public function checkParent($data);
}
