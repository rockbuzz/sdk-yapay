<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class CreditCard implements JsonSerializable
{
    /**
     * @var string
     */
    private $holderName;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $securityCode;

    /**
     * @var int
     */
    private $expirationMonth;

    /**
     * @var int
     */
    private $expirationYear;

    public function __construct(
        string $holderName,
        int $number,
        int $securityCode,
        int $expirationMonth,
        int $expirationYear
    ) {
        $this->holderName = $holderName;
        $this->number = $number;
        $this->securityCode = $securityCode;
        $this->expirationMonth = $expirationMonth;
        $this->expirationYear = $expirationYear;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'nomePortador' => $this->holderName,
            'numeroCartao' => $this->number,
            'codigoSeguranca' => $this->securityCode,
            'dataValidade' => "{$this->expirationMonth}/{$this->expirationYear}"
        ];
    }
}
