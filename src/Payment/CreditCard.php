<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;
use Rockbuzz\StdPayment\ValueObject\CreditCard as BaseCreditCard;

class CreditCard extends BaseCreditCard implements JsonSerializable
{
    public function __construct(
        string $holderName,
        $number,
        $code,
        int $month,
        int $year
    ) {
        parent::__construct($holderName, $number, $code, $month, $year);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'nomePortador' => $this->getHolderName(),
            'numeroCartao' => $this->getNumber(),
            'codigoSeguranca' => $this->getCode(),
            'dataValidade' => "{$this->getMonth()}/{$this->getYear()}"
        ];
    }
}
