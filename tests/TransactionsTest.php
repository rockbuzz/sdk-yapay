<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Transactions;

class TransactionsTest extends TestCase
{
    /** @test */
    public function anTransactionHasMake()
    {
        $config = [
            'store_code' => 1234,
            'username' => 'your_user',
            'password' => 'your_pass',
            'endpoint' => 'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao'
        ];

        $transactions = Transactions::make($config);

        $this->assertInstanceOf(Transactions::class, $transactions);
    }
}
