<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Services\TransactionService;
use http\Client\Response;
use Illuminate\Http\Request;
use Exception;


class TransactionController extends Controller
{
    /**
     * Transaction service
     */
    private $transactionService;

    /**
     * Método construtor
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Method transfer
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(Request $request)
    {
        $data = $request->all();

        $response = ['status' => 200];
               
        try{
            $this->transactionService->transfer($data);
        }catch(Exception $ex){
          $response = [
              'status' => 401,
              'error'  => $ex->getMessage()
          ];
        }
        
        return response()->json($response, $response['status']); 
    }
}
