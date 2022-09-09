<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PearentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum',config('jetstream.auth_session'),  'verified']);

    }
}
