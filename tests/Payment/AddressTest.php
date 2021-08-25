<?php

namespace Tests\Payment;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Payment\Address;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function anAddressMustHaveATwoCharacterState()
    {
        $address = new Address('street', 123, '12345678', 'neigh', 'city', 'STR');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('state must be two characters');
        $address->getState();
    }

    /**
     * @test
     */
    public function anAddressMustHaveAStateWithCapitalLetters()
    {
        $address = new Address('street', 123, '12345678', 'neigh', 'city', 'st');

        $this->assertEquals('ST', $address->getState());
    }

    /**
     * @test
     */
    public function anAddressMustHaveATwoCharacterCountry()
    {
        $address = new Address('street', 123, '12345678', 'neigh', 'city', 'ST', null, 'CTR');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('country must be two characters');

        $address->getCountry();
    }

    /**
     * @test
     */
    public function anAddressMustHaveACountryWithCapitalLetters()
    {
        $address = new Address('street', 123, '12345678', 'neigh', 'city', 'st', null, 'ct');

        $this->assertEquals('CT', $address->getCountry());
    }
}
