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

    /**
     * Metodo execute
     * @return bool|void
     * @throws Exception
     */
    public function execute():array
    {
        $res = Http::get(config('services.authorizer.url'));
        return json_decode($res->body(), true);
    }
}