<?php

namespace Rockbuzz\SDKYapay\Contract;

use Rockbuzz\SDKYapay\Result;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Rockbuzz\SDKYapay\Exception\YapayException;

interface Payment
{
    /**
     * @param ClientInterface|null $client
     * @return Result
     * @throws YapayException
     * @throws GuzzleException
     */
    public function done(ClientInterface $client = null): Result;
}
