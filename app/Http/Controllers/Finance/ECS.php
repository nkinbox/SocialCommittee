<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ECS extends Controller
{
    public function __construct()
    {
        $this->middleware('authLevel:1');
    }
    public function index()
    {
        //
    }

    public function create($member_id)
    {
        //send bank and member detailks with view
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
