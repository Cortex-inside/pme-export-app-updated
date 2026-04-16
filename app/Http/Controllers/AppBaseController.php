<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

/**
 * Base controller for API endpoints.
 * Provides standardised JSON response helpers.
 */
class AppBaseController extends Controller
{
    public function sendResponse(mixed $result, string $message): JsonResponse
    {
        return Response::json([
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ]);
    }

    public function sendError(string $error, int $code = 404): JsonResponse
    {
        return Response::json([
            'success' => false,
            'error'   => $error,
        ], $code);
    }
}
