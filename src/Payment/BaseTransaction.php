<?php

namespace Rockbuzz\SDKYapay\Payment;

abstract class BaseTransaction
{
    /**
     * @var int
     */
    protected $number;

    /**
     * @var int
     */
    protected $value;

    public function __construct(int $number, int $value)
    {
        $this->number = $number;
        $this->value = $value;
    }

    public function notificationUrl(): string
    {
        return $_ENV['SDK_YAPAY_NOTIFICATION_URL'];
    }
}
