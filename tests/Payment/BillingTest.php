<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\{Billing, Customer};
use Rockbuzz\StdPayment\ValueObject\{Address, CPF, Email};

class BillingTest extends TestCase
{
    public function test_a_billing_must_have_to_json()
    {
        $billing = new Billing(
            new Customer(
                123,
                'Customer Name',
                new CPF('48065665004'),
                new Email('example@email.com'),
                new Address('street', 1234, '', '123456-789', 'center', 'City', 'ST')
            )
        );

        $json = json_encode([
            'codigoCliente' => 123,
            'nome' => 'Customer Name',
            'documento' => '48065665004',
            'email' => 'example@email.com',
            'endereco' => [
                'logradouro' => 'street',
                'numero' => '1234',
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
