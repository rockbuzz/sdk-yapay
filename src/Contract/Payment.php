<?php

namespace Rockbuzz\SDKYapay\Contract;

use GuzzleHttp\ClientInterface;
use Rockbuzz\SDKYapay\Result;

interface Payment
{
    public function done(ClientInterface $client = null): Result;
}
