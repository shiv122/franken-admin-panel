<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the API',
            'version' => '1.0.0',
        ]);
    }
}
