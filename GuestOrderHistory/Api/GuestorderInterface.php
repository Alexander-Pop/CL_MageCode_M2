<?php

/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\OrderController\Api;

interface GuestorderInterface
{
    /**
     * Return mixed.
     *
     * @api
     * @param string $param.
     * @return mixed.
     */
    public function getGuestOrderHistory($param);
}