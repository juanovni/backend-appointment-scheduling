<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class ApiHomeController extends Controller
{

    public function index()
    {
        $response = array(
            'status' => "OK",
            'Message' => "The request is ok."
        );

        return $this->successfulMessageShowOne($response);
    }
}
