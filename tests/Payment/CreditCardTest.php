<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\CreditCard;

class CreditCardTest extends TestCase
{
    public function test_a_credit_card_must_have_to_json()
    {
        $creditCard = new CreditCard('Test Name', 123456789, 123, 10, 2020);

        $json = json_encode([
            'nomePortador' => 'Test Name',
            'numeroCartao' => 123456789,
            'codigoSeguranca' => 123,
            'dataValidade' => '10/2020'
        ]);

        $this->assertEquals($json, json_encode($creditCard));
    }
}
