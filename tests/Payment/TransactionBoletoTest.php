<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\TransactionBillet;

class TransactionBoletoTest extends TestCase
{
    /**
     * @test
     */
    public function aTransactionBoletoMustHaveToJason()
    {
        $dueDate = new \Datetime();
        $transactionBoleto = new TransactionBillet(
            123, 1598, $dueDate, 'http://notification-url.com'
        );

        $json = json_encode([
            'numeroTransacao' => 123,
            'valor' => 1598,
            'dataVencimentoBoleto' => $dueDate->format('d/m/Y'),
            'urlCampainha' => 'http://notification-url.com'
        ]);

        $this->assertEquals($json, json_encode($transactionBoleto));
    }
}
