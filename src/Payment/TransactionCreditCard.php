<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class TransactionCreditCard extends BaseTransaction implements JsonSerializable
{
    /**
     * @var int
     */
    private $installments;

    public function __construct(
        int $number,
        int $value,
        int $installments
    ) {
        parent::__construct($number, $value);
        $this->installments = $installments;
    }

    protected function notificationUrl(): string
    {
        return $_ENV['SDK_YAPAY_NOTIFICATION_URL'];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'numeroTransacao' => $this->number,
            'valor' => $this->value,
            'parcelas' => $this->installments,
            'urlCampainha' => $this->notificationUrl(),
        ];
    }
}
