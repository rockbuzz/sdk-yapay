<?php

namespace Rockbuzz\SDKYapay\Payment;

use JsonSerializable;

class ExtraFields implements JsonSerializable
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string[] $extraFields
     */
    public function __construct(array $extraFields)
    {
        array_walk($extraFields, function (string $extraField) {
            $this->add($extraField);
        });
    }

    /**
     * @param string $extraField
     */
    protected function add(string $extraField): void
    {
        array_push($this->data, [
            'chave' => 1001 + count($this->data),
            'valor' => $extraField
        ]);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->data;
    }
}
