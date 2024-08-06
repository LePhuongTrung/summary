<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Log;
use App\Http\Responses\SucceedResponse;

class AuthController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function login(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $loginResult = $this->service->login($credentials['email'], $credentials['password']);
        $responseBody = [
            'user' => $loginResult['user'],
            'token' => $loginResult['token'],
        ];
        $response = new SucceedResponse('', 200);
        return $response->json($responseBody);
    }
}