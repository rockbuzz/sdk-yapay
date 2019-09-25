<?php

namespace Rockbuzz\SDKYapay\Payment;

use Rockbuzz\SDKYapay\Payment\Item;

class Items implements \JsonSerializable
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var Item[] $items
     */
    public function __construct(array $items)
    {
        array_walk($items, function (Item $item) {
            $this->add($item);
        });       
    }
 
    protected function add(Item $item): void
    {
        array_push($this->data, $item);
    }

    public function jsonSerialize()
    {
        return array_map(function (Item $item) {
            return [
                'codigoProduto' => $item->getProductId(),
                'nomeProduto' => $item->getProductName(),
                'valorUnitarioProduto' => $item->getPriceInCents(),
                'quantidadeProduto' => $item->getQuantity()
            ];
        }, $this->data);
    }
}
