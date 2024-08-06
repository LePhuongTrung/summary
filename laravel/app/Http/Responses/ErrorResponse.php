<?php

namespace App\Http\Responses;

class ErrorResponse
{
    protected string $message;
    protected int $httpStatusCode;

    public function __construct(string $message, int $httpStatusCode)
    {
        $this->message = $message;
        $this->httpStatusCode = $httpStatusCode;
    }

    public function json()
    {
        return response()->json([
            'response_body' => [
                'message' => [
                    'error' => $this->message,
                ]
            ]
        ], $this->httpStatusCode);
    }
}