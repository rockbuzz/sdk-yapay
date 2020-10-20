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

    abstract protected function notificationUrl(): string;
}
