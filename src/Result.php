<?php

namespace Rockbuzz\SDKYapay;

use Rockbuzz\SDKYapay\Result\Fail;
use Rockbuzz\SDKYapay\Result\Success;

class Result
{
    /**
     * @var string
     */
    protected $json;

    public function __construct(string $json)
    {
        $this->json = $json;
    }

    public function about()
    {
        if ($this->isSuccess()) {
            return new Success($this->json);
        }

        $json = json_decode($this->json);

        return new Fail(
            $json->erro->codigo,
            $json->erro->mensagem,
            $json->statusTransacao,
            $json->codigoEstabelecimento
        );
    }

    protected function isSuccess(): bool
    {
        return ! array_key_exists('erro', json_decode($this->json));
    }
}
