<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Auth;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function register(UserRegistrationRequest $request):JsonResponse
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $success['token'] =  $user->createToken('UserAccessToken')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, Message::USER_REGISTRATION);
    }

    public function login(UserLoginRequest $request):JsonResponse
    {
        $validated = $request->validated();

        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']]))
        {
            $user = Auth::user();
            $success['token'] =  $user->createToken('UserAccessToken')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, Message::USER_LOGIN);
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=> Message::UNAUTHORISED]);
        }
    }

    public function logout():JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->sendResponse([], Message::USER_LOGOUT);
    }
}
