<?php

namespace App\Http\Controllers;

use App\Models\Procedure;

class ProcedureController extends Controller
{
    public function index()
    {
        return response()->json(Procedure::all());

    }

}
