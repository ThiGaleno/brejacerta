<?php

namespace App\Traits;

trait ApiResponser{

    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($data, $message = null, int $code = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => $code,
        ]);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message, int $code)
    {
        return response()->json([
            'message' => $message,
            'status' => $code,
        ]);
    }

}
