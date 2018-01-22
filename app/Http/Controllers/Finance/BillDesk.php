<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillDesk extends Controller
{
    public function index($fees_id) {
        return $fees_id;
    }
}
