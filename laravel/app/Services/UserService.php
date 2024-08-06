<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use App\Exceptions\UnauthorizedException;

class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password): array
    {
        $user = $this->userRepository->getByEmail($email);
        if (!$user || !Hash::check($password, $user->password)) {
            throw new UnauthorizedException();
        }

        $token = $user->createToken('myAppToken')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}