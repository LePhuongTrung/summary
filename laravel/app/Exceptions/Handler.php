<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Responses\ErrorResponse;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<string>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (\Exception $e, Request $request) {
            Log::error('error', ['message' => $e->getMessage()]);
            Log::error('stackTrace', $e->getTrace());

            if ($e instanceof QueryException) {
                Log::error('Database error: ' . $e->getMessage());
                $response = new ErrorResponse(
                    $e->getMessage(),
                    500
                );
                return $response->json();
            }

            if ($e instanceof \Exception) {
                $response = new ErrorResponse(
                    $e->getMessage(),
                    $e->getCode()
                );
                return $response->json();
            }

            $response = new ErrorResponse(
                'An unexpected error occurred. Please try again later.',
                500
            );
            return $response->json();
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
