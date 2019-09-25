<?php

namespace Rockbuzz\SDKYapay\Payment;

class Item
{
    /**
     * @var string
     */
    private $productId;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var int
     */
    private $priceInCents;

    /**
     * @var int
     */
    private $quantity;

    public function __construct(
        string $productId, 
        string $productName, 
        int $priceInCents,
        int $quantity = 1
    )
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->priceInCents = $priceInCents;
        $this->quantity = $quantity;
    }    
 
    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getPriceInCents(): int
    {
        return $this->priceInCents;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
