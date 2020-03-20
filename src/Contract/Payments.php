<?php

namespace Rockbuzz\SDKYapay\Contract;

use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Exception\PaymentException;
use Rockbuzz\SDKYapay\Result;

interface Payments
{
    /**
     * @param ClientInterface|null $client
     * @return Result
     * @throws PaymentException
     */
    public function findByStoreCodeAndPaymentCode(ClientInterface $client = null): Result;
}
