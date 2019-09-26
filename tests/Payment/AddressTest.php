<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Address;

class AddressTest extends TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage state must be two characters
     */
    public function anAddressMustHaveATwoCharacterState()
    {
        $address = new Address('street', 123, '', '12345678', 'neigh', 'city', 'STR');

        $address->getState();
    }

    /**
     * @test
     */
    public function anAddressMustHaveAStateWithCapitalLetters()
    {
        $address = new Address('street', 123, '', '12345678', 'neigh', 'city', 'st');

        $this->assertEquals('ST', $address->getState());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage country must be two characters
     */
    public function anAddressMustHaveATwoCharacterCountry()
    {
        $address = new Address('street', 123, '', '12345678', 'neigh', 'city', 'ST', 'CTR');

        $address->getCountry();
    }

    /**
     * @test
     */
    public function anAddressMustHaveACountryWithCapitalLetters()
    {
        $address = new Address('street', 123, '', '12345678', 'neigh', 'city', 'st', 'ct');

        $this->assertEquals('CT', $address->getCountry());
    }
}
