<?php

namespace Tests\Result;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Result\Fail;
use Rockbuzz\SDKYapay\Result\Success;

class SuccessTest extends TestCase
{
    /**
     * @test
     */
    public function aSuccessHaveIsBillet()
    {
        $success = new Success(json_encode([
            'codigoFormaPagamento' => 17
        ]));

        $this->assertTrue($success->isBillet());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 29
        ]));

        $this->assertTrue($success->isBillet());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 123
        ]));

        $this->assertFalse($success->isBillet());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 'other'
        ]));

        $this->assertFalse($success->isBillet());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsCreditCard()
    {
        $success = new Success(json_encode([
            'codigoFormaPagamento' => 170
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 171
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 172
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 173
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 174
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 175
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 176
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 177
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 178
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 179
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 180
        ]));

        $this->assertTrue($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 123
        ]));

        $this->assertFalse($success->isCreditCard());

        $success = new Success(json_encode([
            'codigoFormaPagamento' => 'other'
        ]));

        $this->assertFalse($success->isCreditCard());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsPaid()
    {
        $success = new Success(json_encode([
            'statusTransacao' => 1
        ]));

        $this->assertTrue($success->isPaid());

        $success = new Success(json_encode([
            'statusTransacao' => 21
        ]));

        $this->assertTrue($success->isPaid());

        $success = new Success(json_encode([
            'statusTransacao' => 22
        ]));

        $this->assertTrue($success->isPaid());

        $success = new Success(json_encode([
            'statusTransacao' => 123
        ]));

        $this->assertFalse($success->isPaid());

        $success = new Success(json_encode([
            'statusTransacao' => 'other'
        ]));

        $this->assertFalse($success->isPaid());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsWaiting()
    {
        $success = new Success(json_encode([
            'statusTransacao' => 2
        ]));

        $this->assertTrue($success->isWaiting());

        $success = new Success(json_encode([
            'statusTransacao' => 5
        ]));

        $this->assertTrue($success->isWaiting());

        $success = new Success(json_encode([
            'statusTransacao' => 8
        ]));

        $this->assertTrue($success->isWaiting());

        $success = new Success(json_encode([
            'statusTransacao' => 15
        ]));

        $this->assertTrue($success->isWaiting());

        $success = new Success(json_encode([
            'statusTransacao' => 123
        ]));

        $this->assertFalse($success->isWaiting());

        $success = new Success(json_encode([
            'statusTransacao' => 'other'
        ]));

        $this->assertFalse($success->isWaiting());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsRejected()
    {
        $success = new Success(json_encode([
            'statusTransacao' => 3
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 9
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 13
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 14
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 18
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 18
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 50
        ]));

        $this->assertTrue($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 123
        ]));

        $this->assertFalse($success->isRejected());

        $success = new Success(json_encode([
            'statusTransacao' => 'other'
        ]));

        $this->assertFalse($success->isRejected());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsBilletPaidLower()
    {
        $success = new Success(json_encode([
            'statusTransacao' => 21
        ]));

        $this->assertTrue($success->isBilletPaidLower());

        $success = new Success(json_encode([
            'statusTransacao' => 123
        ]));

        $this->assertFalse($success->isBilletPaidLower());

        $success = new Success(json_encode([
            'statusTransacao' => 'other'
        ]));

        $this->assertFalse($success->isBilletPaidLower());
    }

    /**
     * @test
     */
    public function aSuccessHaveIsBilletPaidUpper()
    {
        $success = new Success(json_encode([
            'statusTransacao' => 22
        ]));

        $this->assertTrue($success->isBilletPaidUpper());

        $success = new Success(json_encode([
            'statusTransacao' => 123
        ]));

        $this->assertFalse($success->isBilletPaidUpper());


        $success = new Success(json_encode([
            'statusTransacao' => 'other'
        ]));

        $this->assertFalse($success->isBilletPaidUpper());
    }

    /**
     * @test
     */
    public function aSuccessMustHaveToJsonCreditCard()
    {
        $data = [
            'numeroTransacao' => 123,
            'statusTransacao' => 1,
            'codigoFormaPagamento' => 170,
            'codigoEstabelecimento' => 54321,
            'valor' => 30000,
            'valorDesconto' => 0,
            'parcelas' => 3,
            'autorizacao' => 'abc123',
            'codigoTransacaoOperadora' => 'def456',
            'urlPagamento' => 'https://www.pagamento.com.br',
            'nsu' => 'ghi789',
            'mensagemVenda' => 'mensagem de venda',
            'cartoesUtilizados' => '1234********5678',
            'dataAprovacaoOperadora' => '00/00/0000',
            'numeroComprovanteVenda' => 'jkl123'
        ];

        $success = new Success(json_encode($data));

        $json = json_encode($data);

        $this->assertEquals($json, json_encode($success));
    }

    /**
     * @test
     */
    public function aSuccessMustHaveToJsonBillet()
    {
        $data = [
            'numeroTransacao' => 123,
            'statusTransacao' => 1,
            'codigoFormaPagamento' => 17,
            'codigoEstabelecimento' => 54321,
            'valor' => 30000,
            'valorDesconto' => 0,
            'parcelas' => 3,
            'autorizacao' => 'abc123',
            'codigoTransacaoOperadora' => 'def456',
            'urlPagamento' => 'https://www.pagamento.com.br',
        ];

        $success = new Success(json_encode($data));

        $json = json_encode($data);

        $this->assertEquals($json, json_encode($success));
    }

    /**
     * @test
     */
    public function aSuccessHaveGetTransactionNumber()
    {
        $data = [
            'numeroTransacao' => 123,
        ];

        $success = new Success(json_encode($data));

        $this->assertEquals(123, $success->getTransactionNumber());
    }

    /**
     * @test
     */
    public function aSuccessHaveGetBilletUrl()
    {
        $data = [
            'urlPagamento' => 'http://www.pagamento.com.br',
        ];

        $success = new Success(json_encode($data));

        $this->assertEquals('http://www.pagamento.com.br', $success->getBilletUrl());
    }
}
