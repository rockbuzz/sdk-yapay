<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Config;

class ConfigTest extends TestCase
{
    /** @test */
    public function anConfigMustHaveAValidEndpointUrl()
    {
        $config = new Config(123, 'username', 'password', 'no-url');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('config must have a valid endpoint url');

        $config->getEndpoint();
    }
}
