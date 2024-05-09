<?php

namespace App\Contracts;

interface AdminInterface
{
    public function login($credentials);

    public function logout();

	public function userList($filter, $pagination);

	public function userNew();

	public function userStore($data);

	public function userFind($id);

	public function userUpdate($data, $id);

	public function userDelete($id);

    public function userCheckEmail($data);
}
