<?php

namespace Rockbuzz\SDKYapay\Payment;

use Datetime;
use JsonSerializable;

class TransactionBillet extends BaseTransaction implements JsonSerializable
{
    /**
     * @var Datetime
     */
    private $dueDate;

    public function __construct(
        int $number,
        int $value,
        Datetime $dueDate
    ) {
        parent::__construct($number, $value);
        $this->dueDate = $dueDate;
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
            'dataVencimentoBoleto' => $this->dueDate->format('d/m/Y'),
            'urlCampainha' => $this->notificationUrl(),
        ];
    }
}
