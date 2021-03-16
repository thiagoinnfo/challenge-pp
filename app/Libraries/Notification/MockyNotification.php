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
        $res = Http::get(config('services.notification.url'));
        return json_decode($res->body(), true);
    }
}