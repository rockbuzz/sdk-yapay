<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class Billing implements JsonSerializable
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'codigoCliente' => $this->customer->getId(),
            'nome' => $this->customer->getName(),
            'documento' => $this->customer->getDocument(),
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
