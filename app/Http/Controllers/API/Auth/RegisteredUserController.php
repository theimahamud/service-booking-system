<?php

namespace App\Http\Controllers\API\Auth;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends BaseController
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        $validated  = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('UserAccessToken')->plainTextToken;

        event(new Registered($user));

        return $this->sendResponse(['token' => $token, 'token_type' => 'Bearer','user' => $user], Message::USER_REGISTRATION);

    }
}
