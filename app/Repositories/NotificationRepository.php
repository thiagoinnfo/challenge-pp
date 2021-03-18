<?php


namespace App\Repositories;

use App\Models\Notification;

/**
 * Class NotificationRepository
 * @package App\Repositories
 */
class NotificationRepository
{
    /**
     * Model
     * @var Notification
     */
    private $notification;

    /**
     * NotificationRepository constructor.
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Save notification in database
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        $notification = new $this->notification;
        $notification->transaction_id = $data['transaction_id'];
        $notification->status = $data['status'];
        return $notification->save();
    }
}