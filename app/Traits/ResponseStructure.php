<?php
namespace App\Traits;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait ResponseStructure
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($returnData, string $message = null, int $responseCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $returnData
        ], $responseCode);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse(string $message = null, int $responseCode, $returnData = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $returnData
        ], $responseCode);
    }

}
