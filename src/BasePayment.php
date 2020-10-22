<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Billing;

abstract class BasePayment
{
    /**
     * @var mixed
     */
    protected $methodCode;

    /**
     * @var Items
     */
    protected $items;

    /**
     * @var Billing
     */
    protected $billing;

    public function __construct(Items $items, Billing $billing)
    {
        $this->items = $items;
        $this->billing = $billing;
    }

    abstract protected function methodCode(): int;
}
