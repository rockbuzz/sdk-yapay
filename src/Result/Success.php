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

    const STATUS_MESSAGE = [
        1 => 'Transação está autorizada e confirmada na instituição financeira',
        2 => 'Transação está apenas autorizada, aguardando confirmação (captura)',
        3 => 'Transação negada pela instituição financeira',
        5 => 'Comum para pagamentos cartão redirect ou pagamentos com autenticação',
        8 => 'Comum para pagamentos com boletos e pedidos em reprocessamento',
        9 => 'Houve um problema no processamento com a adquirente',
        13 => 'Transação cancelada na adquirente',
        14 => 'A venda foi estornada na adquirente',
        15 => 'A transação foi enviada para o sistema de análise de riscos. Status transitório',
        17 => 'A transação foi negada pelo sistema análise de risco',
        18 => 'Falha. Não foi possível enviar pedido para a análise de Risco, porém será reenviado',
        21 => 'O boleto foi pago com valor menor do emitido',
        22 => 'O boleto foi pago com valor maior do emitido',
        23 => 'A venda estonada na adquirente parcialmente',
        24 => 'O Estorno não foi autorizado pela adquirente',
        25 => 'Falha ao enviar estorno para a operadora',
        27 => 'Pedido parcialmente cancelado na adquirente',
        30 => 'Número da transação já existe, enviar um número de pedido diferente',
        31 => 'Transação já existente e finalizada na adquirente *Orientamos a verificação da transação antes de ser realizado qualquer ação no pedido/produto',
        40 => 'Processo de cancelamento em andamento',
        49 => 'Pedido em análise manual pelo lojista',
        50 => 'Pedido recusado manualmente pelo lojista'
    ];

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
     * @return string|null
     */
    public function getBilletUrl(): ?string
    {
        return $this->json->urlPagamento ?? null;
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
            'autorizacao' => $this->json->autorizacao ?? null,
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

    public function message()
    {
        return static::STATUS_MESSAGE[$this->json->statusTransacao] ?? 
        'Ouve uma falha no seu pagamento, contate o suporte.';
    }
}
