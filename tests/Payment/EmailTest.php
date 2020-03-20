<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Email;

class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function anEmailMustHaveAValidFormat()
    {
        $email = new Email('no-email');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('email must have a valid format');

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
