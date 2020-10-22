<?php

namespace Rockbuzz\SDKYapay\Contract;

use JsonSerializable;

interface Transaction extends JsonSerializable
{
    public function notificationUrl(): string;
}
