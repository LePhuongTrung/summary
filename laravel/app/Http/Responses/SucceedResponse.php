<?php

namespace App\Http\Responses;

class SucceedResponse
{
    protected string $message;
    protected int $httpStatusCode;

    public function __construct(string $message, int $httpStatusCode)
    {
        $this->message = $message;
        $this->httpStatusCode = $httpStatusCode;
    }

    public function json(array $responseBody)
    {
        return response()->json([
            'response_body' => $responseBody
        ], $this->httpStatusCode);
    }
}
