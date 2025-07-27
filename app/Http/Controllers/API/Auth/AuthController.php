<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Auth;

use App\Constants\Message;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseController
{
    public function __construct(protected UserService $userService) {}

    public function register(UserRegistrationRequest $request): JsonResponse
    {
        $success = $this->userService->registerUser($request->validated());

        return $this->sendResponse($success, Message::USER_REGISTRATION, 201);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $loginData = $this->userService->loginUser($validated['email'], $validated['password']);

        if (! $loginData) {
            return $this->sendError('Unauthorised.', ['error' => Message::UNAUTHORISED]);
        }

        return $this->sendResponse($loginData, Message::USER_LOGIN);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->sendResponse([], Message::USER_LOGOUT);
    }
}
