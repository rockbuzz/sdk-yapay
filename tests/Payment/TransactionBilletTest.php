<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Contract\Transaction;
use Rockbuzz\SDKYapay\Payment\TransactionBillet;

class TransactionBilletTest extends TestCase
{
    public function test_a_boleto_transaction_must_implement_the_transaction_contract()
    {
        $transaction = new TransactionBillet(
            123,
            1598,
            new \Datetime()
        );

        $this->assertInstanceOf(Transaction::class, $transaction);
    }

    public function test_a_boleto_transaction_must_have_to_json()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . './../../', '.env.example');
        $dotenv->load();

        $dueDate = new \Datetime();
        $transactionBoleto = new TransactionBillet(
            123,
            1598,
            $dueDate
        );

        $json = json_encode([
            'numeroTransacao' => 123,
            'valor' => 1598,
            'dataVencimentoBoleto' => $dueDate->format('d/m/Y'),
            'urlCampainha' => 'https://notification_url.com'
        ]);

        $this->assertEquals($json, json_encode($transactionBoleto));
    }
}
