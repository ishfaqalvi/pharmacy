<?php

namespace App\Contracts;

interface CustomerInterface
{
    public function login($guard, $data);

    public function view($guard);

    public function update($guard, $data);

    public function logout($guard);

	public function delete($guard, $id);
}
