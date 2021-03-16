<?php


namespace App\Repositories;

use App\Models\ReprocessNotification;

/**
 * Class ReprocessNotificationRepository
 * @package App\Repositories
 */
class ReprocessNotificationRepository
{
    /**
     * Model
     * @var ReprocessNotification
     */
    private $reprocessNotification;

    /**
     * ReprocessNotificationRepository constructor.
     * @param ReprocessNotification $reprocessNotification
     */
    public function __construct(ReprocessNotification $reprocessNotification)
    {
        $this->reprocessNotification = $reprocessNotification;
    }

    /**
     * Salvar transação para reprocessamento da notificação
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        $reprocess = new $this->reprocessNotification;
        $reprocess->transaction_id = $data['transaction_id'];
        $reprocess->status = 0;
        return $reprocess->save();
    }
}