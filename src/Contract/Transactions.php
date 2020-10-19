<?php

namespace Rockbuzz\SDKYapay\Contract;

use Rockbuzz\SDKYapay\Result;
use Rockbuzz\SDKYapay\Exception\SDKYapayException;

interface Transactions
{
    /**
     * @param mixed $transactionCode
     * @return Result
     * @throws SDKYapayException
     */
    public function findByCode($transactionCode): Result;
}
