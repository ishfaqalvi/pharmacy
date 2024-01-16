<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends BaseController
{
    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'name'          => ['required'],
            'email'         => ['required', 'email'],
            'phone_number'  => ['required']
        ]);

        $user = User::firstOrCreate(
            ['phone_number' => $request->phone_number], 
            ['name' => $request->name, 'email' => $request->email]
        );
        $user->token = $user->createToken("API TOKEN")->plainTextToken;
        return $this->sendResponse($user, 'You have been login successfully!');
    }

    /**
     * View user api
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->sendResponse(auth()->user(), 'Profile data get successfully');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->sendResponse('', 'You have been logout successfully!');
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
        $user = auth()->user();
        $user->update($request->all());
        return $this->sendResponse($user, 'Your profile updated successfully!');
    }

    /**
     * Remove account api
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->tokens()->delete();
        $user->delete();
        return $this->sendResponse('', 'Your account removed successfully.');
    }
}
