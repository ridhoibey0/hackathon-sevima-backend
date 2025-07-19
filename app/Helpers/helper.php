<?php

namespace App\Helpers;

if (!function_exists('successResponse')) {
    function successResponse($status, $message, $results)
    {
        $response = [
            'success' => $status,
            'message' => $message,
            ...$results,
        ];
        return $response;
    }
}
