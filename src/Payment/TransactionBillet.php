<?php

namespace Rockbuzz\SDKYapay\Payment;

use Datetime;
use Rockbuzz\SDKYapay\Contract\Transaction;

class TransactionBillet extends BaseTransaction implements Transaction
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
