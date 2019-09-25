<?php

namespace Rockbuzz\SDKYapay\Payment;

use Rockbuzz\SDKYapay\Payment\Customer;

class Billing implements \JsonSerializable
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function jsonSerialize()
    {
        $data = [
            'codigoCliente' => $this->customer->getId(),
            'nome' => $this->customer->getName(),
            'document' => $this->customer->getDocument(),
            'email' => $this->customer->getEmail()            
        ];

        if ($this->customer->hasAddress()) {
            $data = array_merge(
                $data,
                [
                    'endereco' => [
                        'logradouro' => $this->customer->getAddressStreet(),
                        'numero' => $this->customer->getAddressNumber(),
                        'complemento' => $this->customer->getAddressComplement(),
                        'cep' => $this->customer->getAddressPostalCode(),
                        'bairro' => $this->customer->getAddressNeighborhood(),
                        'cidade' => $this->customer->getAddressCity(),
                        'estado' => $this->customer->getAddressState(),
                        'pais' => $this->customer->getAddressCountry()
                    ]
                ]
            );
        }

        return $data;
    }
}
