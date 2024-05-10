<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\CustomerInterface;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    protected $customer;

    function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $responce = $this->customer->login('customerapi', $request->all());
        return $this->sendResponse($responce, 'You have been login successfully!');
    }

    /**
     * View user api
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $customer = $this->customer->view('customerapi');
        return $this->sendResponse($customer, 'Profile data get successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = $this->customer->update('customerapi', $request->all());
        return $this->sendResponse($customer, 'Your profile updated successfully!');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->customer->logout('customerapi');
        return $this->sendResponse('', 'You have been logout successfully!');
    }

    /**
     * Remove account api
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customer->delete('customerapi', $id);

        return $this->sendResponse('', 'Your account removed successfully.');
    }
}
