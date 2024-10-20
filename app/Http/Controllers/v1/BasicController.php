<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
}
