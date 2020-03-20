<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class Items implements JsonSerializable
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

    /**
     * @param Item $item
     */
    protected function add(Item $item): void
    {
        array_push($this->data, $item);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
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
