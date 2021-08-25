<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\TransactionCreditCard;

class TransactionCreditCardTest extends TestCase
{
    /**
     * @test
     */
    public function aTransactionCreditCardMustHaveToJason()
    {
        $transactionCreditCard = new TransactionCreditCard(
            123,
            1598,
            2,
            'http://notification-url.com'
        );

        $json = json_encode([
            'numeroTransacao' => 123,
            'valor' => 1598,
            'parcelas' => 2,
            'urlCampainha' => 'http://notification-url.com'
        ]);

        $this->assertEquals($json, json_encode($transactionCreditCard));
    }
}
