<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Items;
use Rockbuzz\StdPayment\ValueObject\Item;

class ItemsTest extends TestCase
{
    public function test_should_throw_exception_when_creating_an_item_without_item()
    {
        $this->expectException(\TypeError::class);

        new Items(['no-item']);
    }

    public function test_a_items_must_have_to_json()
    {
        $items = new Items([
            new Item('12345', 'Product Name', 1478),
            new Item('67890', 'Product Name Two', 6987, 2)
        ]);

        $json = json_encode(
            [
                [
                    'codigoProduto' => '12345',
                    'nomeProduto' => 'Product Name',
                    'valorUnitarioProduto' => 1478,
                    'quantidadeProduto' => 1
                ],
                [
                    'codigoProduto' => '67890',
                    'nomeProduto' => 'Product Name Two',
                    'valorUnitarioProduto' => 6987,
                    'quantidadeProduto' => 2
                ]
            ]
        );

        $this->assertEquals($json, json_encode($items));
    }
}
