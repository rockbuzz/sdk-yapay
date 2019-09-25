<?php

namespace Rockbuzz\SDKYapay\Payment;

class TransactionBoleto extends BaseTransaction implements \JsonSerializable
{
    /**
     * @var \Datetime
     */
    private $dueDate;

    public function __construct(
        int $number, 
        int $value, 
        \Datetime $dueDate, 
        string $notificationUrl
    )
    {
        parent::__construct($number, $value, $notificationUrl);   
        $this->dueDate = $dueDate;      
    }

    public function jsonSerialize()
    {
        return [
            'numeroTransacao' => $this->number,
            'valor' => $this->value,
            'dataVencimentoBoleto' => $this->dueDate->format('d/m/Y'),
            'urlCampainha' => $this->notificationUrl,
        ];
    }
}
