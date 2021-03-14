<?php

namespace App\Libraries\Authorization;

use Illuminate\Support\Facades\Http;
use Exception;

/**
 * Class MockyAuthorization
 * @package App\Libraries\Authorization
 */
class MockyAuthorization implements Authorization
{

    public function execute()
    {
        $res = Http::get(config('services.authorizer.url'));
        $body = $res->body();
        if($body['message'] != 'Autorizado'){
            throw new Exception("Serviço não autorizado.");
        }
    }
}