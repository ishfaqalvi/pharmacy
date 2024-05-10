<?php

namespace App\Repositories;
use App\Models\Customer;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Auth;

class CustomerRepository implements CustomerInterface
{
	public function login($guard, $data)
	{
        $customer = Customer::firstOrCreate(
            ['phone_number' => $data['phone_number']],
            ['name' => $data['name'], 'phone_number' => $data['phone_number']]
        );
        if($guard == 'customerapi')
        {
            $customer->token = $customer->createToken("Customer API TOKEN")->plainTextToken;
        }else{
            Auth::guard('customer')->login($customer, true);
        }
        return $customer;
	}

	public function view($guard)
	{
        return Auth::guard($guard)->user();
	}

    public function update($guard, $data)
	{
        $customer = Auth::guard($guard)->user();
        $customer->update($data);
        return $customer;
	}

    public function logout($guard)
	{
        if($guard == 'customerapi'){
            Auth::guard($guard)->user()->tokens()->delete();
        }else{
            Auth::guard('customer')->logout();
        }
        return true;
	}

	public function delete($guard, $id)
    {
        $customer = Customer::find($id);
        $guard == 'customerapi' ? $customer->tokens()->delete() : '';

        $customer->delete();
    }
}
