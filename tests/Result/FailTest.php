<?php

namespace Tests\Result;

use PHPUnit\Framework\TestCase;
use Rockbuzz\SDKYapay\Result\Fail;

class FailTest extends TestCase
{
    public function test_a_fail_must_have_to_jason()
    {
        $fail = new Fail('500', 'Test Message', 1, '123');

        $json = json_encode([
            'erro' => [
                'codigo' => '500',
                'mensagem' => 'Test Message'
            ],
            'statusTransacao' => 1,
            'codigoEstabelecimento' => '123'
        ]);

        $this->assertEquals($json, json_encode($fail));
    }
}
