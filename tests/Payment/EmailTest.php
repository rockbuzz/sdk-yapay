<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Email;

class EmailTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage email must have a valid format
     */
    public function anEmailMustHaveAValidFormat()
    {
        $email = new Email('no-email');

        $email->getValue();
    }

    /**
     * @test
     */
    public function emailValid()
    {
        $email = new Email('email@domain.com');

        $this->assertEquals('email@domain.com', $email->getValue());
    }
}
