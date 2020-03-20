<?php

namespace Rockbuzz\SDKYapay\Contract;

use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Result;

interface Payments
{
    public function findByStoreCodeAndPaymentCode(ClientInterface $client = null): Result;
}
