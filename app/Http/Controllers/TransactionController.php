<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;
use Exception;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * @var TransactionService
     */
    private $transactionService;

    /**
     * TransactionController constructor.
     * @param TransactionService $transactionService
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

        $response = ['status' => 200, 'message' => 'Successful transfer'];
               
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
