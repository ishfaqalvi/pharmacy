<?php

namespace App\Repositories;
use App\Models\User;
use App\Contracts\AdminInterface;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminRepository implements AdminInterface
{
	public function login($credentials)
	{
        if (Auth::guard('web')->attempt($credentials)) {
            return true;
        }
        return false;
	}

	public function logout()
	{
        return Auth::guard('web')->logout();
	}

	public function userList($filter = null, $pagination = false)
	{
        $query = User::query();
        return $pagination ? $query->paginate() : $query->get();
	}

    public function userNew()
    {
        $user = new User();
        $roles = Role::pluck('name','id')->all();
        return [$user, $roles];
    }

	public function userStore($data)
    {
        $user = User::create($data);
        $user->assignRole($data['roles']);
    }

	public function userFind($id)
    {
        return User::find($id);
    }

	public function userUpdate($data, $id)
    {

    }

	public function userDelete($id)
    {

    }

    public function userCheckEmail($data)
    {
        $query = User::query();
        if (isset($data['id'])) {
            $query->where('id','!=',$data['id']);
        }
        $user = $query->whereEmail($data['email'])->first();

        if($user){ return "false"; }else{ return "true";}
    }
}
