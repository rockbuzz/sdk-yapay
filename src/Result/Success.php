<?php

namespace Rockbuzz\SDKYapay\Result;

use JsonSerializable;

class Success implements JsonSerializable
{
    const METHODS_BILLET = [17, 29];
    const METHODS_CREDIT_CARD = [170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180];
    const TRANSACTION_STATUS_PAID = [1, 21, 22];
    const TRANSACTION_STATUS_WAITING = [2, 5, 8, 15];
    const TRANSACTION_STATUS_REJECTED = [3, 9, 13, 14, 17, 18, 50];
    const TRANSACTION_STATUS_BILLET_LOWER = 21;
    const TRANSACTION_STATUS_BILLET_UPPER = 22;

    /**
     * @var string
     */
    protected $json;

    public function __construct(string $json)
    {
        $this->json = json_decode($json);
    }

    /**
     * @return bool
     */
    public function isBillet(): bool
    {
        return in_array($this->json->codigoFormaPagamento, self::METHODS_BILLET);
    }

    /**
     * @return bool
     */
    public function isCreditCard(): bool
    {
        return in_array($this->json->codigoFormaPagamento, self::METHODS_CREDIT_CARD);
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return in_array($this->json->statusTransacao, self::TRANSACTION_STATUS_PAID);
    }

    /**
     * @return bool
     */
    public function isWaiting(): bool
    {
        return in_array($this->json->statusTransacao, self::TRANSACTION_STATUS_WAITING);
    }

    /**
     * @return bool
     */
    public function isRejected(): bool
    {
        return in_array($this->json->statusTransacao, self::TRANSACTION_STATUS_REJECTED);
    }

    /**
     * @return bool
     */
    public function isBilletPaidLower(): bool
    {
        return $this->json->statusTransacao == self::TRANSACTION_STATUS_BILLET_LOWER;
    }

    /**
     * @return bool
     */
    public function isBilletPaidUpper(): bool
    {
        return $this->json->statusTransacao == self::TRANSACTION_STATUS_BILLET_UPPER;
    }

    /**
     * @return int
     */
    public function getTransactionNumber(): int
    {
        return $this->json->numeroTransacao;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'numeroTransacao' => $this->json->numeroTransacao,
            'statusTransacao' => $this->json->statusTransacao,
            'codigoFormaPagamento' => $this->json->codigoFormaPagamento,
            'codigoEstabelecimento' => $this->json->codigoEstabelecimento,
            'valor' => $this->json->valor,
            'valorDesconto' => $this->json->valorDesconto,
            'parcelas' => $this->json->parcelas,
            'autorizacao' => $this->json->autorizacao,
            'codigoTransacaoOperadora' => $this->json->codigoTransacaoOperadora,
            'urlPagamento' => $this->json->urlPagamento
        ];

        if ($this->isCreditCard()) {
            $data = array_merge($data, [
                'nsu' => $this->json->nsu,
                'mensagemVenda' => $this->json->mensagemVenda,
                'cartoesUtilizados' => $this->json->cartoesUtilizados,
                'dataAprovacaoOperadora' => $this->json->dataAprovacaoOperadora,
                'numeroComprovanteVenda' => $this->json->numeroComprovanteVenda
            ]);
        }

        return $data;
    }
}
