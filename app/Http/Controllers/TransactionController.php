<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(TransactionRequest $request)
    {
        return response()->json($request->getParams());
    }
}
