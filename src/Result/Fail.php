<?php

namespace Rockbuzz\SDKYapay\Result;

use JsonSerializable;

class Fail implements JsonSerializable
{
    /**
     * @var string
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * @var int
     */
    protected $transactionStatus;

    /**
     * @var string
     */
    protected $storeCode;

    public function __construct(
        string $errorCode,
        string $errorMessage,
        int $transactionStatus,
        string $storeCode
    ) {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->transactionStatus = $transactionStatus;
        $this->storeCode = $storeCode;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'erro' => [
                'codigo' => $this->errorCode,
                'mensagem' => $this->errorMessage
            ],
            'statusTransacao' => $this->transactionStatus,
            'codigoEstabelecimento' => $this->storeCode
        ];
    }
}
