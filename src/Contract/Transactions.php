<?php

namespace Rockbuzz\SDKYapay\Contract;

use Rockbuzz\SDKYapay\Result;
use Rockbuzz\SDKYapay\Exception\YapayException;

interface Transactions
{
    /** @throws YapayException */
    public function findByNumber(int $number): Result;
}
