<?php

namespace App\Libraries\Authorization;

/**
 * Class Authorization
 */
class AuthorizationStrategy
{
    /**
     * Strategy
     */
    private $strategy;

    /**
     * Method Constructor
     */
    public function __construct(Authorization $autorization)
    {
        $this->strategy = $autorization;
    }

    /**
     * Execute
     */
    public function execute()
    {
        return $this->strategy->execute();
    }
}