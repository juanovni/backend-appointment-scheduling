<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

trait apiResponse
{
    function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    function successShowMessage($message, $code = 200)
    {
        return $this->successResponse(
            [
                'code' => $code,
                'message' => $message,
                'success' => true
            ],
            $code
        );
    }

    function errorResponse($error, $message, $code = 401)
    {
        if (config('app.debug') === false) {
            $message = config('messages.exception.general_error');
        }
        return response()->json(
            [
                'error' =>
                [
                    'code'    => $code,
                    'type'    => $error,
                    'message' => $message,
                    'status' => false,
                ]
            ],
            $code
        );
    }

    function showErrors($message, $code)
    {
        return response()->json(['errors' => ['message' => $message, 'code' => $code]], $code);
    }

    function successfulMessageShowAll($payload)
    {
        return $payload;
    }

    function successfulMessageShowOne($payload, $code = 200)
    {
        return response()->json(['data' => $payload], $code);
    }

    function notFoundMessage($message = 'Registro no encontrado', $code = 400)
    {
        return response()->json(
            [
                'error' =>
                [
                    'code' => $code,
                    'message' => $message,
                    'success' => false
                ]
            ],
            $code
        );
    }
}
