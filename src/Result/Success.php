<?php

namespace Rockbuzz\SDKYapay\Result;

class Success implements \JsonSerializable
{
    const METHOD_BOLETO = 29;
    const METHOD_CREDITCARD = 170;
    /**
     * @var string
     */
    protected $json;

    public function __construct(string $json)
    {
        $this->json = json_decode($json);
    }

    public function isBoleto(): bool
    {
        return $this->json->codigoFormaPagamento == self::METHOD_BOLETO;
    }

    public function isCredidCard(): bool
    {
        return $this->json->codigoFormaPagamento == self::METHOD_CREDITCARD;
    }

    public function jsonSerialize()
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

        if ($this->isCredidCard()) {
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
