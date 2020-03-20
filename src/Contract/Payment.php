<?php

namespace Rockbuzz\SDKYapay\Contract;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Exception\PaymentException;
use Rockbuzz\SDKYapay\Result;

interface Payment
{
    /**
     * @param ClientInterface|null $client
     * @return Result
     * @throws PaymentException
     * @throws GuzzleException
     */
    public function done(ClientInterface $client = null): Result;
}
