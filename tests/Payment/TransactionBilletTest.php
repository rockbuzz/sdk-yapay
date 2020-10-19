<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\TransactionBillet;

class TransactionBilletTest extends TestCase
{
    /**
     * @test
     */
    public function aTransactionBoletoMustHaveToJason()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . './../../');
        $dotenv->load();

        $dueDate = new \Datetime();
        $transactionBoleto = new TransactionBillet(
            123, 1598, $dueDate
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
