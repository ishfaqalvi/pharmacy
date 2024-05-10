<?php

namespace App\Contracts;

interface CartInterface
{
	public function list($token);

	public function store($data);

	public function update($data, $id);

	public function delete($id);
}
