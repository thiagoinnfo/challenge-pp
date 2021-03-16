<?php

namespace App\Libraries\Notification;

/**
 * Class Notification
 */
class NotificationStrategy
{
    /**
     * Strategy
     */
    private $strategy;

    /**
     * Method Constructor
     */
    public function __construct(Notification $notification)
    {
        $this->strategy = $notification;
    }

    /**
     * Execute
     */
    public function execute():array
    {
       return $this->strategy->execute();
    }
}