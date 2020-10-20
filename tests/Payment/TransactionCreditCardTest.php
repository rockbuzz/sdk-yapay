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
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . './../../', '.env.example');
        $dotenv->load();

        $transactionCreditCard = new TransactionCreditCard(
            123, 1598, 2
        );

        $json = json_encode([
            'numeroTransacao' => 123,
            'valor' => 1598,
            'parcelas' => 2,
            'urlCampainha' => 'https://notification_url.com'
        ]);

        $this->assertEquals($json, json_encode($transactionCreditCard));
    }
}
