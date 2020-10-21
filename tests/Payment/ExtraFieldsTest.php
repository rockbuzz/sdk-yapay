<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\ExtraFields;

class ExtraFieldsTest extends TestCase
{
    public function test_a_items_must_have_to_json()
    {
        $extraFields = new ExtraFields([
            'extra one',
            'extra two',
            'extra three'
        ]);

        $json = json_encode(
            [
                [
                    'chave' => 1001,
                    'valor' => 'extra one'
                ],
                [
                    'chave' => 1002,
                    'valor' => 'extra two'
                ],
                [
                    'chave' => 1003,
                    'valor' => 'extra three'
                ]
            ]
        );

        $this->assertEquals($json, json_encode($extraFields));
    }
}
