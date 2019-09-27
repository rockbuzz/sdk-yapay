<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Config;

class ConfigTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage config must have a valid endpoint url
     */
    public function anConfigMustHaveAValidEndpointUrl()
    {
        $config = new Config(123, 'username', 'password', 'no-url');

        $config->getEndpoint();
    }
}
