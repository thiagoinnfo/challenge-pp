<?php

namespace App\Libraries\Notification;

use Illuminate\Support\Facades\Http;

/**
 * Class MockyNotification
 * @package App\Libraries\Notification
 */
class MockyNotification implements Notification
{
    /**
     * Metodo execute
     * @return array
     */
    public function execute():array
    {
        $response = [
            'status' => false,
            'message' => ''
        ];

        $request = Http::get(config('services.notification.url'));
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