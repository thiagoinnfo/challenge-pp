<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionRequest extends Controller
{
   /**
    * Definição das mensagens de erros
    * @array
    */
   private $messages = [
      'value.required' => 'O valor é obrigatório',
      'value.numeric'  => 'O valor é inválido',
      'value.not_in'   => 'O valor precisa ser maior que 0',
      'payer.required' => 'O pagador é obrigatório',
      'payer.integer'  => 'O pagador é inválido',
      'payee.required' => 'O beneficiário é obrigatório',
      'payee.integer'  => 'O beneficiário é inválido',
   ];

   /**
    * Método construtor 
    */
   public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'value' => 'required|numeric|min:0|not_in:0',
            'payer' => 'required|integer',
            'payee' => 'required|integer'
         ],
         $this->messages
      );

      parent::__construct($request);
   }

}