<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerUser(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $success['token'] =  $user->createToken('UserAccessToken')->plainTextToken;
        $success['name'] =  $user->name;

        return $success;
    }

    public function loginUser(string $email, string $password): array|null
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        return [
            'token' => $user->createToken('UserAccessToken')->plainTextToken,
            'name' => $user->name,
        ];
    }
}
