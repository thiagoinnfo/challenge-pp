<?php

namespace App\Libraries\Authorization;

use Illuminate\Support\Facades\Http;

/**
 * Class MockyAuthorization
 * @package App\Libraries\Authorization
 */
class MockyAuthorization implements Authorization
{
    /**
     * Method execute
     * @return array
     */
    public function execute():array
    {
        $response = [
            'status' => false,
            'message' => ''
        ];

        $request = Http::get(config('services.authorizer.url'));
        $res = $request->json();

        if($request->ok()){
           $response = [
               'status' => true,
               'message' => $res['message'] ?? ''
           ];
        }

        return $response;
    }
}