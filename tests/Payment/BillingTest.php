<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Customer;
use Rockbuzz\SDKYapay\Payment\Billing;
use Rockbuzz\SDKYapay\Payment\Email;
use Rockbuzz\SDKYapay\Payment\Address;

class BillingTest extends TestCase
{
    /**
     * @test
     */
    public function aBillingMustHaveToJason()
    {
        $billing = new Billing(
                new Customer(123, 'Customer Name', '123456789', new Email('example@email.com'),
                new Address('street', 1234, '', '123456-789', 'center', 'City', 'ST')
            )
        );

        $json = json_encode([
            'codigoCliente' => 123,
            'nome' => 'Customer Name',
            'document' => '123456789',
            'email' => 'example@email.com',
            'endereco' => [
                'logradouro' => 'street',
                'numero' => 1234,
                'complemento' => '',
                'cep' => '123456-789',
                'bairro' => 'center',
                'cidade' => 'City',
                'estado' => 'ST',
                'pais' => 'BR'
            ]
        ]);

        $this->assertEquals($json, json_encode($billing));
    }
}
