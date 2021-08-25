<?php

namespace Rockbuzz\SDKYapay\Payment;

class BaseTransaction
{
    /**
     * @var int
     */
    protected $number;

    /**
     * @var int
     */
    protected $value;

    /**
     * @var string
     */
    protected $notificationUrl;

    public function __construct(
        int $number,
        int $value,
        string $notificationUrl
    ) {
        $this->number = $number;
        $this->value = $value;
        $this->notificationUrl = $notificationUrl;
    }
}
