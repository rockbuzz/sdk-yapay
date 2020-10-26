<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Contract\Transaction;
use Rockbuzz\SDKYapay\Payment\TransactionCreditCard;

class TransactionCreditCardTest extends TestCase
{
    public function test_a_creditcard_transaction_must_implement_the_transaction_contract()
    {
        $transaction = new TransactionCreditCard(
            123,
            1598,
            2
        );

        $this->assertInstanceOf(Transaction::class, $transaction);
    }

    public function test_a_creditcard_transaction_must_have_to_json()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . './../../', '.env.example');
        $dotenv->load();

        $transactionCreditCard = new TransactionCreditCard(
            123,
            1598,
            2
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
