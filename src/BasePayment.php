<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\SDKYapay\Payment\Billing;

abstract class BasePayment
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var int
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

    public function __construct(
        Config $config, 
        int $methodCode,
        Items $items,
        Billing $billing
    )
    {
        $this->config = $config;
        $this->methodCode = $methodCode;
        $this->items = $items;
        $this->billing = $billing;
    }
}
