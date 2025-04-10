<?php
namespace App\Trait\Api;

trait ApiResponseTrait
{
    public function apiResponse($data = null,$status =null,$message = null)
    {

        return response()->json([
            'data' => $data,
            'status' => $status,
            'message' => $message,
        ]);
    }
}
