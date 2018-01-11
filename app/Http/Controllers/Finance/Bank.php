<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bank extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:1');
    }
}
