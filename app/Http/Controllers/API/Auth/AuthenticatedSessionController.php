<?php

namespace App\Http\Controllers\Api\Auth;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends BaseController
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $request->user();

        $token = $user->createToken('UserAccessToken')->plainTextToken;

        return $this->sendResponse(['token' => $token, 'token_type' => 'Bearer','user' => $user], Message::USER_LOGIN);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return $this->sendResponse([], Message::USER_LOGOUT);
    }
}
