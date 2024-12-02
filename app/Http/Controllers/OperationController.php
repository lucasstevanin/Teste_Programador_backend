<?php

namespace App\Http\Controllers;

use App\Models\Operation;

class OperationController extends Controller
{
    public function index()
    {
        // Retorna todas as operações
        return response()->json(Operation::all());
    }
}
