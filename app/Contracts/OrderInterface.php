<?php

namespace App\Contracts;

interface OrderInterface
{
	public function list($guard, $pagination);

	public function store($guard, $data);

	public function update($data, $id);

	public function cancel($guard, $id);

	public function delete($guard, $id);
}